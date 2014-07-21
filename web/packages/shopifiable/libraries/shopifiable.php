<?php

    /**
     * @class Shopifiable
     * @property string $_baseUrl :protected - Composed base url to call.
     * @property JsonHelper $_jsonHelper :protected - Concrete5's built-in JSON wrapper.
     */
    class Shopifiable {


        const RESOURCE_PRODUCTS             = '/admin/products.json',
              RESOURCE_PRODUCT_BY_ID        = '/admin/products/%s.json',
              RESOURCE_CUSTOM_COLLECTIONS   = '/admin/custom_collections.json',
              RESOURCE_SMART_COLLECTIONS    = '/admin/smart_collections.json';


        protected $_baseUrl,
                  $_jsonHelper;

        private static $instance;


        /**
         * @param string $apiKey optional
         * @param string $password optional
         * @param string $hostName optional
         */
        public function __construct( $apiKey = ShopifiablePackage::API_KEY, $password = ShopifiablePackage::PASSWORD, $hostName = ShopifiablePackage::HOST_NAME ){
            $this->_baseUrl     = sprintf('https://%s:%s@%s', $apiKey, $password, $hostName);
            $this->_jsonHelper  = Loader::helper('json');
        }


        protected static function _instance(){
            if( !(self::$instance instanceof self) ){
                self::$instance = new self();
            }
            return self::$instance;
        }


        /**
         * Get list of products, optionally passing in filter parameters.
         * @param array $parameters Query parameters
         * @return stdClass
         */
        public static function getProducts( array $parameters = array() ){
            return self::_instance()->apiCall(self::RESOURCE_PRODUCTS, $parameters);
        }


        /**
         * Retrieve a product by its ID from the API.
         * @param $productID
         * @return stdClass
         */
        public static function getProductByID( $productID ){
            $apiResponse = self::_instance()->apiCall(sprintf(self::RESOURCE_PRODUCT_BY_ID, $productID));
            // Return just the product object property
            if( is_object($apiResponse) && property_exists($apiResponse, 'product') ){
                return $apiResponse->product;
            }
        }


        /**
         * Get a list of custom collections, optionally passing in filter parameters.
         * @param array $parameters Query parameters
         * @return stdClass
         */
        public static function getCustomCollections( array $parameters = array() ){
            return self::_instance()->apiCall(self::RESOURCE_CUSTOM_COLLECTIONS, $parameters);
        }


        /**
         * Get list of smart collections, optionally passing in filter parameters.
         * @param array $parameters Query parameters
         * @return stdClass
         */
        public static function getSmartCollections( array $parameters = array() ){
            return self::_instance()->apiCall(self::RESOURCE_SMART_COLLECTIONS, $parameters);
        }


        /**
         * Issue call to the API and return full response *(NOT parsed)*.
         * @param string $resource Resource path
         * @param array $parameters Query parameters (eg. filters)
         * @return string
         * @throws Exception
         */
        private function apiCall( $resource, array $parameters = array() ){
            $curly = !empty($parameters) ?
                curl_init( $this->_baseUrl . $resource . '?' . http_build_query($parameters) )
              : curl_init( $this->_baseUrl . $resource );

            // Set options
            curl_setopt_array($curly, array(
                CURLOPT_HEADER          => true,
                CURLOPT_RETURNTRANSFER  => true,
                CURLOPT_FOLLOWLOCATION  => true,
                CURLOPT_SSL_VERIFYPEER  => true,
                CURLOPT_SSL_VERIFYHOST  => 2,
                CURLOPT_MAXREDIRS       => 3,
                CURLOPT_CONNECTTIMEOUT  => 3, // 3 seconds
                CURLOPT_TIMEOUT         => 8  // 8 seconds
            ));

            // Exec request and store in $response
            $response = curl_exec($curly);

            // Close the CURL session
            curl_close($curly);

            // Parse out HTTP headers, and response body
            list($headers, $body) = explode("\r\n\r\n", $response, 2);

            // Check the headers; if OK, try and parse response body as JSON
            if( $this->parseResponseHeaders($headers) ){
                try {
                    $parsed = $this->_jsonHelper->decode($body);

                    // Errors?
                    if( is_object($parsed) && property_exists($parsed, 'errors') ){
                        throw new Exception(sprintf('Shopifiable API errors: %s', print_r($parsed->errors, true)));
                    }

                    return $parsed;
                }catch(Exception $e){
                    throw $e; // Rethrow
                }
            }
        }


        /**
         * Parse the response headers from the call to Shopify API; and just make sure that the
         * response code is within the 200 range; else throw an exception.
         * @param string $httpHeaders
         * @return bool
         * @throws Exception
         * @todo: parse and look at HTTP code response; if valid, return true, else throw an exception
         */
        private function parseResponseHeaders( $httpHeaders ){
            // split the headers into an array
            $headers    = preg_split("/\r\n|\n|\r/", $httpHeaders);
            // preg_grep returns array w/ prefilled keys; array_values sets key to 0
            $status     = array_values( preg_grep("/status/i", $headers) );
            // array([0] => Status:, [1] => {int}, [2] => OK)
            $pieces     = explode(' ', $status[0]);
            $httpCode   = (int) $pieces[1];
            // finally, check the status code
            if( $httpCode >= 200 && $httpCode < 300 ){
                return true;
            }

            throw new Exception(sprintf('Shopifiable API error; %s', print_r($status[0], true)));
        }

    }
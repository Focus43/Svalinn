<?php defined('C5_EXECUTE') or die("Access Denied.");

    class ShopifiableImageImport extends Job {

        public function getJobName(){ return 'Shopifiable Image Import'; }
        public function getJobDescription(){ return 'Pre-cache product images locally'; }

        public function run(){
            try {

                $fileHelper   = Loader::helper('file');
                $tmpDirectory = $fileHelper->getTemporaryDirectory();
                $tmpQueued    = $tmpDirectory . '/product_queue';

                if( ! is_dir($tmpQueued) ){
                    return 'Nothing to process';
                }

                $dirContents = $fileHelper->getDirectoryContents($tmpQueued);
                if( is_array($dirContents) && !empty($dirContents) ){
                    $count = 0;
                    foreach($dirContents AS $fileName){
                        $productObj = unserialize($fileHelper->getContents($tmpQueued . '/' . $fileName));
                        if( is_object($productObj) && !empty($productObj->images) ){
                            foreach($productObj->images AS $stdClassImage){
                                ShopifiableImage::getOrCreate($stdClassImage->src);
                                $count++;
                            }
                        }
                    }

                    // Empty the directory after all are done processing
                    $fileHelper->removeAll($tmpQueued);
                }

                return 'Successfully processed ' . $count . ' images';

            }catch(Exception $e){
                throw $e; // rethrow
            }
        }

    }
<?php defined('C5_EXECUTE') or die(_("Access Denied."));

    class ContactController extends ShieldPageController {

        protected $includeThemeAssets = true;


        public function view(){
            $this->addFooterItem($this->getHelper('html')->javascript('contact-page.js', self::PACKAGE_HANDLE));
        }


        /**
         * Handler for AJAX sending of the form...
         * @todo: implement actual email service (currently just logs)
         */
        public function send_form(){
            /** @var $validationHelper Concrete5_Helper_Validation_Form */
            $validationHelper = $this->getHelper('validation/form');
            $validationHelper->setData($_REQUEST);
            $validationHelper->addRequired('name', 'name');
            $validationHelper->addRequiredEmail('email', 'email');

            // If invalid; send response for JS to parse errors...
            if( ! $validationHelper->test() ){
                /** @var $error ValidationErrorHelper */
                $error = $validationHelper->getError();
                $list  = $error->getList();
                $this->formResponder(false, $list);
                exit;
            }

            // If here, it's valid (send email)...
            $this->issueEmail();
            // Log the entry as well
            Log::addEntry(print_r($_REQUEST,true), 'contact_email');
            // Return JSON
            $this->formResponder(true, 'Thanks');
        }


        private function issueEmail(){
            $mailerObj = $this->getHelper('mail');
            $mailerObj->to('kim@snakeriverk9.com');
            $mailerObj->from(OUTGOING_MAIL_ISSUER_ADDRESS);
            $mailerObj->addParameter('formData', (object)$_REQUEST);
            $mailerObj->load('contact_form', self::PACKAGE_HANDLE);
            $mailerObj->sendMail();
        }

    }

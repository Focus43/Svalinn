<?php defined('C5_EXECUTE') or die(_("Access Denied."));

    class UpgradeTask_v0_42 {

        /**
         * Backtrack on some previously installed attributes and
         * the blog page type.
         */
        public static function run( Package $controller ){
            $homePage = Page::getByID(1);

            // Private Client
            $privateClient = $controller->pageFactory($homePage, 'Private Client', 'sublanding');

                // About
                $controller->pageFactory($privateClient, 'About Us');

                // Svalinn Difference
                $difference = $controller->pageFactory($privateClient, 'The Svalinn Difference');
                $controller->pageFactory($difference, 'Training / Levels');
                $controller->pageFactory($difference, 'Guarantee');
                $controller->pageFactory($difference, 'Breed Specifications');

                // Protection
                $protection = $controller->pageFactory($privateClient, 'Protection');
                $controller->pageFactory($protection, 'Family');
                $controller->pageFactory($protection, 'Individual');
                $controller->pageFactory($protection, 'Executive');

                // Purchase process
                $purchase = $controller->pageFactory($privateClient, 'Purchase Process');
                $controller->pageFactory($purchase, 'Selection Process');
                $controller->pageFactory($purchase, 'Securing Your Dog');
                $controller->pageFactory($purchase, 'Handler Training');
                $controller->pageFactory($purchase, 'Customer Support');

            // Professional
            $professional = $controller->pageFactory($homePage, 'Professional', 'sublanding');

                // About
                $controller->pageFactory($professional, 'About Us');

                // Svalinn Difference
                $difference = $controller->pageFactory($professional, 'The Svalinn Difference');
                $controller->pageFactory($difference, 'Training / Levels');
                $controller->pageFactory($difference, 'Guarantee');
                $controller->pageFactory($difference, 'Breed Specifications');

                // K9s
                $controller->pageFactory($professional, 'K9s');

                // K9 teams
                $controller->pageFactory($professional, 'K9 Teams');

                // Advise & Assist
                $controller->pageFactory($professional, 'Advise and Assist');

                // Science & Technology
                $controller->pageFactory($professional, 'Science And Technology');

            // Legal
            $controller->pageFactory($homePage, 'Privacy Policy', 'sublanding');
            $controller->pageFactory($homePage, 'Security Policy', 'sublanding');
        }

    }
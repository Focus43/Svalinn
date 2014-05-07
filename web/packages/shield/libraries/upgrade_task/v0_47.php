<?php defined('C5_EXECUTE') or die(_("Access Denied."));

    /**
     * Class UpgradeTask_v0_47, for upgrading on the staging site, this will go through
     * and replay all the previous upgrade tasks.
     */
    class UpgradeTask_v0_47 {

        public static function run( Package $controller ){
            /** @var $fileHelper FileHelper */
            $fileHelper  = Loader::helper('file');
            $libsPath    = Environment::get()->getPath(DIRNAME_LIBRARIES . '/upgrade_task/', 'shield');
            $dirContents = $fileHelper->getDirectoryContents($libsPath);

            // Register classes for autoloading
            $autoLoads = array();
            foreach($dirContents AS $fileName){
                // if contains '47', its THIS task currently being run, so skip it
                if( !(strpos($fileName, '47')) ){
                    $handle = preg_replace("/(.+)\.php$/", "$1", $fileName);
                    $klass = sprintf('UpgradeTask_%s', $handle);
                    $autoLoads[$klass] = array('library', "upgrade_task/{$handle}", 'shield');
                }
            }

            // Pass to autoloader
            Loader::registerAutoload($autoLoads);

            // Run all of em
            foreach($autoLoads AS $className => $array){
                try {
                    call_user_func_array(array($className, 'run'), array($controller));
                }catch(Exception $e){
                    throw new Exception("Tried executing upgrade_task {$className} but failed");
                }
            }
        }

    }
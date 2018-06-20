<?php

require('/var/www/html/teamer/smarty/Smarty.class.php');
require('/var/www/html/teamer/libs/main.php');

class Eventbase_Smarty extends Smarty {
    function __construct() {
        parent::__construct();
        $this->setTemplateDir('templates');
        $this->setCompileDir('templates_c');
        $this->setConfigDir('configs');
        $this->setCacheDir('cache');
        // uncomment the following to test the smarty directories
        //$this->testInstall();
        
      } 
}
?>
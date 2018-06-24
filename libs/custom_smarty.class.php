<?php
class Custom_Smarty extends Smarty {
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
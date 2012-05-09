<?php 

class TemplateParams_LinkedInShare {
    
    private $_eeTemplate;

    public function __construct(EE_Template $eeTemplate) {
        $this->_eeTemplate = $eeTemplate;
    }

    function getUrl() {
        return $this->_eeTemplate->fetch_param('url');
    }
    function getSuccessCallback(){
        return $this->_eeTemplate->fetch_param('success_callback');
    }
    function getErrorCallback(){
        return $this->_eeTemplate->fetch_param('error_callback');
    }
    function getCounter(){
        return $this->_eeTemplate->fetch_param('counter');
    }
    function getShowZero(){
        return $this->_eeTemplate->fetch_param('show_zero');
    }
}


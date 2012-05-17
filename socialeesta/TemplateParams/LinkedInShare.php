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
        return $this->_eeTemplate->fetch_param('on_success');
    }
    function getErrorCallback(){
        return $this->_eeTemplate->fetch_param('on_error');
    }
    function getCounter(){
        return $this->_eeTemplate->fetch_param('counter');
    }
    function getShowZero(){
        return $this->_eeTemplate->fetch_param('show_zero');
    }
}


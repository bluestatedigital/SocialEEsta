<?php 

class TemplateParams_GooglePlusOne {
    
    private $_eeTemplate;

    public function __construct(EE_Template $eeTemplate) {
        $this->_eeTemplate = $eeTemplate;
    }

    function getHref() {
        return $this->_eeTemplate->fetch_param('href');
    }
    function getSize(){
        return $this->_eeTemplate->fetch_param('size') ? $this->_eeTemplate->fetch_param('size') : "medium";
    }
    function getAnnotation(){
        return $this->_eeTemplate->fetch_param('annotation') ? $this->_eeTemplate->fetch_param('annotation') : "bubble";
    }
    function getWidth(){
        return $this->_eeTemplate->fetch_param('width');
    }
    function getJsCallback(){
        return $this->_eeTemplate->fetch_param('callback');
    }
    function getCssClass(){
        return $this->_eeTemplate->fetch_param('class');
    }
    function getCssId(){
        return $this->_eeTemplate->fetch_param('id');
    }
    function getAction(){
        return $this->_eeTemplate->fetch_param('action') ? $this->_eeTemplate->fetch_param('action') : "";
    }
}


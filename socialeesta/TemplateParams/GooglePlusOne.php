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
        return $this->_eeTemplate->fetch_param('size', "medium");
    }
    function getAnnotation(){
        return $this->_eeTemplate->fetch_param('annotation', "bubble");
    }
    function getWidth(){
        return $this->_eeTemplate->fetch_param('width');
    }
    function getJsCallback(){
        return $this->_eeTemplate->fetch_param('callback', NULL);
    }
    function getCssClass(){
        return $this->_eeTemplate->fetch_param('class', NULL);
    }
    function getCssId(){
        return $this->_eeTemplate->fetch_param('id', NULL);
    }
    function getIncludeJS(){
        return $this->_eeTemplate->fetch_param('include_js', "no") === "yes";
    }
}


<?php 

class TemplateParams_FacebookLike {
    
    private $_eeTemplate;

    public function __construct(EE_Template $eeTemplate) {
        $this->_eeTemplate = $eeTemplate;
    }

    function getSend() {
        return $this->_eeTemplate->fetch_param('send', "false");
    }
    function getWidth(){
        return $this->_eeTemplate->fetch_param('width', "450");
    }
    function getLayout(){
        return $this->_eeTemplate->fetch_param('layout', "button_count");
    }
    function getShowFaces() {
        return $this->_eeTemplate->fetch_param('show-faces', "false");
    }
    function getFont(){
        return $this->_eeTemplate->fetch_param('font');
    }
    function getIncludeJS(){
        return $this->_eeTemplate->fetch_param('include_js', "no") === "no";
    }
}
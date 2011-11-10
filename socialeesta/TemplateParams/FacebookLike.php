<?php 

class TemplateParams_FacebookLike {
    
    private $_eeTemplate;

    public function __construct(EE_Template $eeTemplate) {
        $this->_eeTemplate = $eeTemplate;
    }

    function getType() {
        return $this->_eeTemplate->fetch_param('type', 'html5');
    }
    function getHref() {
        return $this->_eeTemplate->fetch_param('href');
    }
    function getSend() {
        return $this->_eeTemplate->fetch_param('send', "false");
    }
    function getLayout(){
        return $this->_eeTemplate->fetch_param('layout', "button_count");
    }
    function getShowFaces() {
        return $this->_eeTemplate->fetch_param('show_faces', "false");
    }

    function getWidth(){
        return $this->_eeTemplate->fetch_param('width', "450");
    }
    function getAction(){
        return $this->_eeTemplate->fetch_param('action', 'like');
    }

    function getFont(){
        return $this->_eeTemplate->fetch_param('font', 'lucida grande');
    }
    function getColor(){
        return $this->_eeTemplate->fetch_param('color', 'blue');
    }
    function getRef(){
        return $this->_eeTemplate->fetch_param('ref');
    }
    function getCssClass(){
        return $this->_eeTemplate->fetch_param('class');
    }
    function getCssId(){
        return $this->_eeTemplate->fetch_param('id');
    }
    function getIncludeJS(){
        return $this->_eeTemplate->fetch_param('include_js', "no") === "yes";
    }
}


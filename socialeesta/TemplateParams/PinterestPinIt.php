<?php 

class TemplateParams_PinterestPinIt {
    
    private $_eeTemplate;

    public function __construct(EE_Template $eeTemplate) {
        $this->_eeTemplate = $eeTemplate;
    }
    public function getUrl(){
        return $this->_eeTemplate->fetch_param('url');
    }
    public function getMedia(){
        return $this->_eeTemplate->fetch_param('media');
    }
    public function getDescription(){
        return $this->_eeTemplate->fetch_param('description');
    }
    public function getCount(){
        return $this->_eeTemplate->fetch_param('count') ? $this->_eeTemplate->fetch_param('count') : "none";
    }
    
}
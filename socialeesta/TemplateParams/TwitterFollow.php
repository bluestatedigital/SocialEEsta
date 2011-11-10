<?php 

class TemplateParams_TwitterFollow {
    
    private $_eeTemplate;

    public function __construct(EE_Template $eeTemplate) {
        $this->_eeTemplate = $eeTemplate;
    }
    function getType() {
        return $this->_eeTemplate->fetch_param('type', 'html5');
    }
    function getUser(){
        return $this->_eeTemplate->fetch_param('user');
    }
    function getFollowerCount(){
        return $this->_eeTemplate->fetch_param('follower_count');
    }
    function getWidth(){
        return $this->_eeTemplate->fetch_param('follower_count') === "yes" ? $this->_eeTemplate->fetch_param('width','300') : $this->_eeTemplate->fetch_param('width','200');
    }
    function getButtonColor(){
        return $this->_eeTemplate->fetch_param('button_color', 'blue');
    }
    function getTextColor(){
        return $this->_eeTemplate->fetch_param('text_color');
    }
    function getLinkColor(){
        return $this->_eeTemplate->fetch_param('link_color');
    }
    function getAlign(){
        return $this->_eeTemplate->fetch_param('align');
    }
    function getCssClass(){
        return $this->_eeTemplate->fetch_param('class');
    }
    function getCssId(){
        return $this->_eeTemplate->fetch_param('id');
    }
    function getLang(){
        return $this->_eeTemplate->fetch_param('language', 'en');
    }
    public function getIncludeJS() {
        return $this->_eeTemplate->fetch_param('include_js', 'no') == 'yes';
    }
    
}
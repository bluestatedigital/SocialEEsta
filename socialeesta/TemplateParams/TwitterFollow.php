<?php 

class TemplateParams_TwitterFollow {
    
    private $_eeTemplate;

    public function __construct(EE_Template $eeTemplate) {
        $this->_eeTemplate = $eeTemplate;
    }
    function getType() {
        return $this->_eeTemplate->fetch_param('type') ? $this->_eeTemplate->fetch_param('type') : 'html5';
    }
    function getUser(){
        return $this->_eeTemplate->fetch_param('user');
    }
    function getFollowerCount(){
        return $this->_eeTemplate->fetch_param('follower_count') === "yes" ? "yes" : "no" ;
    }
    function getShowScreenName(){
        return $this->_eeTemplate->fetch_param('show_screen_name') === "no" ? "no" : "yes";
    }
    function getWidth(){
        if ($this->_eeTemplate->fetch_param('follower_count') === "yes"){
            return $this->_eeTemplate->fetch_param('width') ? $this->_eeTemplate->fetch_param('width') : '300';
        } else {
            return $this->_eeTemplate->fetch_param('width') ? $this->_eeTemplate->fetch_param('width') : '200';
        }
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
        return $this->_eeTemplate->fetch_param('language') ? $this->_eeTemplate->fetch_param('language') : 'en';
    }
    function getSize(){
        return $this->_eeTemplate->fetch_param('size') !== '' ? $this->_eeTemplate->fetch_param('size') : "medium" ;
    }
    
}
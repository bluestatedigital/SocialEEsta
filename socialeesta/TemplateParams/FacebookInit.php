<?php 

class FacebookInit {
    
    private $_eeTemplate;

    public function __construct(EE_Template $eeTemplate) {
        $this->_eeTemplate = $eeTemplate;
    }
    function getChannelUrl() {
        return $this->_eeTemplate->fetch_param('channel_url');
    }
    function getStatus() {
        return $this->_eeTemplate->fetch_param('status', true);
    }
    function getCookie(){
        return $this->_eeTemplate->fetch_param('cookie', true);
    }
    function getOauth(){
        return $this->_eeTemplate->fetch_param('oauth', true);
    }
    function xfbml(){
        return $this->_eeTemplate->fetch_param('xfbml', true);
    }
   
}
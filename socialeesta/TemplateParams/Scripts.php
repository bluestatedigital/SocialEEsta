<?php 

class TemplateParams_Scripts {
    
    private $_eeTemplate;

    public function __construct(EE_Template $eeTemplate) {
        $this->_eeTemplate = $eeTemplate;
    }

    function includeFacebook() {
        return $this->_eeTemplate->fetch_param('facebook', "yes") === "yes";
    }
    function includeGoogle(){
        return $this->_eeTemplate->fetch_param('google', "yes") === "yes";
    }
    function includeTwitter(){
        return $this->_eeTemplate->fetch_param('twitter', "yes") === "yes";
    }
    function getFbChannelUrl() {
        return $this->_eeTemplate->fetch_param('fb_channel_url', NULL);
    }
    function getFbAppId(){
        return $this->_eeTemplate->fetch_param('fb_app_id');
    }
}
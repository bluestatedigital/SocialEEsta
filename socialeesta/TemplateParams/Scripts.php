<?php 

class TemplateParams_Scripts {
    
    private $_eeTemplate;
    private $_params = array();
    private $_scripts = array(
        "facebook" => FALSE,
        "twitter" => FALSE,
        "google" => FALSE
    );

    public function __construct(EE_Template $eeTemplate) {
        $this->_eeTemplate = $eeTemplate;
        $this->_params = explode("|", $this->_eeTemplate->fetch_param('scripts'));
    }
    public function setFacebook(){
        $this->_scripts["facebook"] = in_array("facebook", $this->_params);
    }
    public function setTwitter(){
        $this->_scripts["twitter"] = in_array("twitter", $this->_params);
    }
    public function setGoogle(){
        $this->_scripts["google"] = in_array("google", $this->_params);
    }
    
    function includeFacebook() {
        return $this->_scripts['facebook'];
    }
    function includeGoogle(){
        return $this->_scripts['google'];
    }
    function includeTwitter(){
        return $this->_scripts['twitter'];
    }
    function getFbChannelUrl() {
        return $this->_eeTemplate->fetch_param('fb_channel_url', NULL);
    }
    function getFbAppId(){
        return $this->_eeTemplate->fetch_param('fb_app_id', NULL);
    }
}
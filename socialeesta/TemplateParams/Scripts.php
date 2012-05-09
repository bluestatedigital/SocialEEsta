<?php 

class TemplateParams_Scripts {
    
    private $_eeTemplate;
    private $_params = array();
    private $_scripts = array(
        "facebook" => FALSE,
        "twitter" => FALSE,
        "google" => FALSE,
        "linkedin" => FALSE
    );

    public function __construct(EE_Template $eeTemplate) {
        $this->_eeTemplate = $eeTemplate;
        $this->_params = explode("|", $this->_eeTemplate->fetch_param('scripts'));
        $this->_setFacebook();
        $this->_setTwitter();
        $this->_setGoogle();
        $this->_setLinkedIn();
    }
    private function _setFacebook(){
        $this->_scripts["facebook"] = in_array("facebook", $this->_params);
    }
    private function _setTwitter(){
        $this->_scripts["twitter"] = in_array("twitter", $this->_params);
    }
    private function _setGoogle(){
        $this->_scripts["google"] = in_array("google", $this->_params);
    }
    private function _setLinkedIn(){
        $this->_scripts["linkedin"] = in_array("linkedin", $this->_params);
    }
    
    public function getScripts(){
        return $this->_scripts;
    }
    public function getParams(){
        return $this->_params;
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
    function includeLinkedIn(){
        return $this->_scripts['linkedin'];
    }
    function getFbChannelUrl() {
        return $this->_eeTemplate->fetch_param('fb_channel_url');
    }
    function getFbAppId(){
        return $this->_eeTemplate->fetch_param('fb_app_id');
    }
    function getFbCanvasAutoGrow(){
        return $this->_eeTemplate->fetch_param('fb_canvas_autogrow');
    }
}
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
        if ($this->_eeTemplate->fetch_param('scripts') !== ""){
            $this->_params = explode("|", $this->_eeTemplate->fetch_param('scripts'));
        }

        $this->_setScripts();
    }
    private function _setScripts(){
        foreach ( $this->_params as $value ){
            $this->_scripts[$value] = TRUE;
        }
    }
    public function getScripts(){
        return $this->_scripts;
    }
    public function getParams(){
        return $this->_params;
    }
    public function includeLibrary($lib){
        if (isset($this->_scripts[$lib])){
            return $this->_scripts[$lib];
        } else {
            return FALSE;
        }
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
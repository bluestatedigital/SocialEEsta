<?php
require_once 'FacebookJS.php';
require_once 'GoogleJS.php';
require_once 'TwitterJS.php';
require_once 'LinkedInJS.php';
require_once 'PinterestJS.php';

class JSLibraries {
    
    private $_params;
    private $_facebookJS;
    private $_twitterJS;
    private $_googleJS;
    private $_linkedInJS;
    private $_pinterestJS;
    private $_scripts;
    
    public function __construct($params) {
        $this->_params = $params;
        $this->_setScripts($this->_params);
    }
    private function _setScripts($params){
        if ($this->_params->includeLibrary('facebook')){
            $this->_facebookJS = new FacebookJS($this->_params->getFbAppId(), $this->_params->getFbChannelUrl(), $this->_params->getFbCanvasAutoGrow());
            $this->_scripts .= $this->_facebookJS->asyncScript();
            $this->_scripts .= $this->_facebookJS->getFbInit();
        }
        if ($this->_params->includeLibrary('google')){
            $this->_googleJS = new GoogleJS();
            $this->_scripts .= $this->_googleJS->asyncScript();
        }
        if ($this->_params->includeLibrary('twitter')){
            $this->_twitterJS = new TwitterJS();
            $this->_scripts .= $this->_twitterJS->asyncScript();
        }
        if ($this->_params->includeLibrary('linkedin')){
            $this->_linkedInJS = new LinkedInJS();
            $this->_scripts .= $this->_linkedInJS->asyncScript();
        }
        if ($this->_params->includeLibrary('pinterest')){
            $this->_pinterestJS = new PinterestJS();
            $this->_scripts .= $this->_pinterestJS->asyncScript();
        }
        
    }
    public function getScripts(){
        
        return $this->_scripts;
    }
}

?>
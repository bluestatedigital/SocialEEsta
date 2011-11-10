<?php
class JSLibraries {
    
    private $_params;
    private $_facebookJS;
    private $_twitterJS;
    private $_googleJS;
    
    
    public function __construct($params, $googleJS, $twitterJS, $facebookJS) {
        
        $this->_params = $params;
        $this->_googleJS = $googleJS;
        $this->_twitterJS = $twitterJS;
        $this->_facebookJS = $facebookJS;
    
    }

    public function getScripts(){
        $_scripts = "";
        if ($this->_params->includeFacebook()){
            $_scripts .= $this->_facebookJS->asyncScript();
            $this->_facebookJS->setAppId($this->_params->getFbAppId());
            $this->_facebookJS->setChannelUrl($this->_params->getFbChannelUrl());
            $_scripts .= $this->_facebookJS->getFbInit();
        }
        if ($this->_params->includeGoogle()){
            $_scripts .= $this->_googleJS->asyncScript();
        }
        if ($this->_params->includeTwitter()){
            $_scripts .= $this->_twitterJS->asyncScript();
            
        }
        return $_scripts;
    }
}

?>
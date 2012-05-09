<?php
class JSLibraries {
    
    private $_params;
    private $_facebookJS;
    private $_twitterJS;
    private $_googleJS;
    private $_linkedInJS;
    
    
    public function __construct($params, $googleJS, $twitterJS, $facebookJS, $linkedInJS) {
        
        $this->_params = $params;
        $this->_googleJS = $googleJS;
        $this->_twitterJS = $twitterJS;
        $this->_facebookJS = $facebookJS;
        $this->_linkedInJS = $linkedInJS;
    
    }

    public function getScripts(){
        $_scripts = "";
        if ($this->_params->includeFacebook()){
            $_scripts .= $this->_facebookJS->asyncScript();
            $this->_facebookJS->setAutoGrow($this->_params->getFbCanvasAutoGrow());
            $_scripts .= $this->_facebookJS->getFbInit();
        }
        if ($this->_params->includeGoogle()){
            $_scripts .= $this->_googleJS->asyncScript();
        }
        if ($this->_params->includeTwitter()){
            $_scripts .= $this->_twitterJS->asyncScript();
            
        }
        if ($this->_params->includeLinkedIn()){
            $_scripts .= $this->_linkedInJS->asyncScript();
        }
        return $_scripts;
    }
}

?>
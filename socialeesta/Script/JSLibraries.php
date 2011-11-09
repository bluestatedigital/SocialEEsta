<?php
class JSLibraries {
    const CLASS_NAME = "Socialeesta_ext";
    
    private $_eeTemplate;
    private $_scripts;
    private $_facebookJs;
    private $_twitterJs;
    private $_googleJs;
    private $_extensionSettings = array();
    
    public function __construct(EE_Template $eeTemplate) {
        $this->_eeTemplate = $eeTemplate;
        $_extensionSettings = unserialize($this->db->get_where('exp_extensions', array('class' => self::CLASS_NAME)));
    }
    
    private function includeFacebook(){
        return $this->_extensionSettings['include_fb'] == 'y';
    }
    private function includeTwitter(){
        return $this->_extensionSettings['include_tw'] == 'y';
    }
    private function includeGoogle(){
        return $this->_extensionSettings['include_goog'] == 'y';
    }
    
    
    public function getScripts($fb, $goog, $tw){
        if ($this->includeFacebook()){
            $_scripts .= $fb->asyncScript();
            $_scripts .= $fb->fbInit($this->_extensionSettings['fb_app'], $this->_extensionSettings['fb_channelurl']);
            $
        }
        if ($this->includeGoogle()){
            $_scripts .= $goog->asyncScript();
        }
        if ($this->includeTwitter()){
            $_scripts .= $fb->asyncScript();
            
        }
        return $_scripts;
    }
}

?>
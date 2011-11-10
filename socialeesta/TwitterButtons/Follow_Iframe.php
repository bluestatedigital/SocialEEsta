<?php

class Tweet_Iframe {
    const IFRAME_URL = "//platform.twitter.com/widgets/follow_button.html";
    
    private $_queryString;
    private $_countPosition;
    private $_iframeWidth;
    
    private function _setIframeHeight(){
        switch ($this->_countPosition){
            case "vertical":
                $this->_iframeHeight = "62px";
                break;
            case "horizontal";
            default:
                $this->_iframeHeight = "20px";
                
        }
    }
    public function __construct(QueryString $queryString, $width) {
        $this->_queryString = $queryString;
        $this->_countPosition = $countPosition;
        $this->_iframeWidth = $width;
    }
    

    public function getHtml(){
        return '<iframe allowtransparency="true" frameborder="0" scrolling="no" src="' 
                . self::IFRAME_URL 
                . $this->_queryString
                . '" style="width:'
                . $this->_iframeWidth
                . '; height:20px;"></iframe>';
    }
}
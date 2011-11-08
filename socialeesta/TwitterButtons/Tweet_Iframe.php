<?php

class Tweet_Iframe {
    const IFRAME_URL = "//platform.twitter.com/widgets/tweet_button.html";
    
    private $_queryString;
    private $_countPosition;
    private $_iframeHeight;
    
    private function _setIframeHeight(){
        switch ($this->_queryString->getValue("count")) {
            case "vertical":
                $this->_iframeHeight = "62px";
                break;
            case "horizontal";
            default:
                $this->_iframeHeight = "20px";
                
        }
    }
    public function __construct(QueryString $queryString) {
        $this->_queryString = $queryString;
        $this->_setIframeHeight();
    }
    

    public function getHtml(){
        return '<iframe allowtransparency="true" frameborder="0" scrolling="no" src="' 
                . self::IFRAME_URL 
                . $this->_queryString->getQueryString()
                . '" style="width:130px; height:'
                . $this->_iframeHeight
                . ';"></iframe>';
    }
}
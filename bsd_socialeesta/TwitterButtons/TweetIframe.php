<?php

class TweetIframe(){
    const IFRAME_URL = "http://platform.twitter.com/widgets/tweet_button.html";
    
    private $_queryString;
    private $_countPosition;
    private $_iframeHeight;
    
    private function _setIframeHeight(){
        switch $this->_countPosition{
            case "vertical":
                $this->_iframeHeight = "62px";
                break;
            case "horizontal";
            default:
                $this->_iframeHeight = "20px";
                
        }
    }
    public function __construct(QueryString $queryString, $countPosition) {
        $this->_queryString = $queryString;
        $this->_countPosition = $countPosition;
        $this->_setIframeHeight();
    }
    
    public function getHtml(){
        return '<iframe allowtransparency="true" frameborder="0" scrolling="no" src="' 
                . $this->IFRAME_URL 
                . $this->_queryString
                . '" style="width:130px; height:'
                . $this->_iframeHeight;
                . ';"></iframe>';
    }
}
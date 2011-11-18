<?php

class Follow_Iframe {
    const IFRAME_URL = "//platform.twitter.com/widgets/follow_button.html";
    
    private $_queryString;
    private $_countPosition;
    private $_iframeWidth;
    
    public function __construct(QueryString $queryString, $width) {
        $this->_queryString = $queryString;
        $this->_iframeWidth = $width;
    }
    

    public function getHtml(){
        return '<iframe allowtransparency="true" frameborder="0" scrolling="no" src="' 
                . self::IFRAME_URL 
                . $this->_queryString->getQueryString()
                . '" style="width:'
                . $this->_iframeWidth
                . '; height:20px;"></iframe>';
    }
}
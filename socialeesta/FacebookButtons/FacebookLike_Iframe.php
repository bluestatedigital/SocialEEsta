<?php
//<iframe src="//www.facebook.com/plugins/like.php?href&amp;send=false&amp;layout=standard&amp;width=450&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font&amp;height=80&amp;appId=250150298363679" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:80px;" allowTransparency="true"></iframe>

class FacebookLike_Iframe {
    const IFRAME_URL = "//www.facebook.com/plugins/like.php";
    
    private $_queryString;
    private $_countPosition;
    private $_iframeWidth;
    private $_iframeHeight;
    
    private function _getIframeHeight(){
        switch ($this->_queryString->getValue('layout')){
            case "standard":
                return "35px";
            case "box_count":
                return "65px";
            case "button_count":
            default:
                return "20px";
        }
    }
    
    
    public function __construct(QueryString $queryString) {
        $this->_queryString = $queryString;
    }
    

    public function getHtml(){
        return '<iframe src="' 
                . self::IFRAME_URL 
                . $this->_queryString->getQueryString()
                . '" allowtransparency="true" frameborder="0" scrolling="no" style="width:'
                . $this->_queryString->getValue('width')
                . 'px; height: '
                . $this->_getIframeHeight() 
                . '"></iframe>';
    }
}
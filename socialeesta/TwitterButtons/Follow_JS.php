<?php 

class Follow_JS {
    const TWITTER_URL = "https://twitter.com/";
    const SHARE_BUTTON_CLASS = "twitter-follow-button";

    private $_widget;
    private $_dataAttrs;
    private $_id;
    private $_class;

    public function __construct(DataAttrs $dataAttrs, $htmlAttrs = array("id" => '', "class" => '')) {
        $this->_dataAttrs = $dataAttrs;
        
        if(!isset($htmlAttrs['id'])) $htmlAttrs['id'] = '';
        if(!isset($htmlAttrs['class'])) $htmlAttrs['class'] = '';
        $this->setCssId($htmlAttrs['id']);
        $this->setCssClass($htmlAttrs['class']);
    }

    private function setCssId($id) {
        if (!empty($id)) {
            $this->_id = $id;
        }
    }

    private function setCssClass($class) {
        $this->_class = self::SHARE_BUTTON_CLASS;
        if (!empty($class)) {
            $this->_class .= " " . $class;
        }
    }
    
    public function getCssClass(){
        return $this->_class;
    }
    public function getCssId(){
        return $this->_id;
    }
    public function getShareButtonClass(){
        return self::SHARE_BUTTON_CLASS;
    }
    public function getTwitterUrl(){
        return self::TWITTER_URL;
    }

    public function getHtml() {
        $html = '<a href="' . self::TWITTER_URL . $this->_dataAttrs->fetchAttr("screen-name") . '" ' . $this->_dataAttrs->getAttrs();

        if (!empty($this->_id)) {
            $html .= ' id="' . $this->_id . '"';
        }

        $html .= ' class="' . $this->_class . '"';
        $html .= ">Follow @" . $this->_dataAttrs->fetchAttr("screen-name") . "</a>";

        return $html;
    }
}
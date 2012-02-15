<?php 

class Follow_JS {
    const TWITTER_URL = "https://twitter.com/";
    const SHARE_BUTTON_CLASS = "twitter-follow-button";

    private $_widget;
    private $_dataAttrs;
    private $_id;
    private $_class;

    public function __construct(DataAttrs $dataAttrs, $htmlAttrs = array("id" => NULL, "class" => NULL)) {
        $this->_dataAttrs = $dataAttrs;
        
        isset($htmlAttrs['id']) ?: $htmlAttrs['id'] = NULL;
        isset($htmlAttrs['class']) ?: $htmlAttrs['class'] = NULL;
        $this->setCssId($htmlAttrs['id']);
        $this->setCssClass($htmlAttrs['class']);
    }

    private function setCssId($id) {
        if (isset($id)) {
            $this->_id = $id;
        }
    }

    private function setCssClass($class) {
        $this->_class = self::SHARE_BUTTON_CLASS;
        if (isset($class)) {
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

        if (isset($this->_id)) {
            $html .= ' id="' . $this->_id . '"';
        }

        if (isset($this->_class)) {
            $html .= ' class="' . $this->_class . '"';
        }

        $html .= ">Follow @" . $this->_dataAttrs->fetchAttr("screen-name") . "</a>";

        return $html;
    }
}
<?php 

class Tweet_JS {
    const SHARE_URL = "http://twitter.com/share";
    const SHARE_BUTTON_CLASS = "twitter-share-button";

    private $_widget;
    private $_dataAttrs;
    private $_id;
    private $_class;

    public function __construct(DataAttrs $dataAttrs, $id = NULL, $class = NULL) {
        $this->_dataAttrs = $dataAttrs;
        $this->setId($id);
        $this->setClass($class);
    }

    private function setId($id) {
        if (!is_null($id)) {
            $this->_id = $id;
        }
    }
    
    private function setClass($class) {
        $this->_class = self::SHARE_BUTTON_CLASS;
        if (!is_null($class)) {
            $this->_class .= " " . $class;
        }
    }
    public function getId(){
        return $this->_id;
    }
    public function getClass(){
        return $this->_class;
    }
    public function getShareUrl(){
        return self::SHARE_URL;
    }
    
    public function getHtml($linkText = "Tweet") {
        $html = '';
        $html .= '<a href="' . self::SHARE_URL . '" ' . $this->_dataAttrs->getAttrs();

        if (!is_null($this->_id)) {
            $html .= ' id="' . $this->_id . '"';
        }

        if (!is_null($this->_class)) {
            $html .= ' class="' . $this->_class . '"';
        }

        $html .= ">$linkText</a>";

        return $html;
    }
}
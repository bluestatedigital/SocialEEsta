<?php 

class Tweet_JS {
    const SHARE_URL = "http://twitter.com/share";
    const SHARE_BUTTON_CLASS = "twitter-share-button";

    private $_widget;
    private $_dataAttrs;
    private $_id;
    private $_class;

    public function __construct(DataAttrs $dataAttrs) {
        $this->_dataAttrs = $dataAttrs;
    }

    public function setId($id) {
        if (!is_null($id)) {
            $this->_id = $id;
        }
    }

    public function setClass($class) {
        $this->_class = self::SHARE_BUTTON_CLASS;
        if (!is_null($class)) {
            $this->_class .= " " . $class;
        }
    }

    public function getHtml($linkText) {
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
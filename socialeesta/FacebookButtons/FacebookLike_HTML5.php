<?php 

class FacebookLike_HTML5 {
    
    const LIKE_BUTTON_CLASS = "fb-like";
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
        $this->_class = self::LIKE_BUTTON_CLASS;
        if (!is_null($class)) {
            $this->_class .= " " . $class;
        }
    }

    public function getHtml() {
        $html = '';

        $html .= '<div class="' 
        . $this->_class 
        . '" ';
        

        if (!is_null($this->_id)) {
            $html .= ' id="' . $this->_id . '"';
        }
        
        $html .= $this->_dataAttrs->getAttrs();

        $html .= "></div>";

        return $html;
    }
}
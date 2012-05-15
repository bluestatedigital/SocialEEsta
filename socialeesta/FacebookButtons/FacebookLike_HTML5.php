<?php 

class FacebookLike_HTML5 {
    
    const LIKE_BUTTON_CLASS = "fb-like";
    private $_dataAttrs;
    private $_id;
    private $_class;

    public function __construct(DataAttrs $dataAttrs, $htmlAttrs = array("id" => NULL, "class" => NULL)) {
        $this->_dataAttrs = $dataAttrs;
        
        if (!isset($htmlAttrs['id'])) $htmlAttrs['id'] = NULL;
        if (!isset($htmlAttrs['class'])) $htmlAttrs['class'] = NULL;
        $this->setCssId($htmlAttrs['id']);
        $this->setCssClass($htmlAttrs['class']);
        
    }

    private function setCssId($id) {
        if (!empty($id)) {
            $this->_id = $id;
        }
    }

    private function setCssClass($class) {
        $this->_class = self::LIKE_BUTTON_CLASS;
        if (!empty($class)) {
            $this->_class .= " " . $class;
        }
    }
    public function getShareButtonClass(){
        return self::LIKE_BUTTON_CLASS;
    }
    public function getCssId(){
        return $this->_id;
    }
    public function getCssClass(){
        return $this->_class;
    }

    public function getHtml() {
        $html = '<div class="' 
        . $this->_class 
        . '"';
        

        if (!empty($this->_id)) {
            $html .= ' id="' . $this->_id . '"';
        }
        
        $html .= " " . $this->_dataAttrs->getAttrs();

        $html .= "></div>";

        return $html;
    }
}
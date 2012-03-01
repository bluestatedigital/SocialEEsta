<?php 

class GooglePlusOne_HTML5 {
    
    const PLUSONE_BUTTON_CLASS = "g-plusone";
    private $_dataAttrs;
    private $_id = NULL;
    private $_class = NULL;
    private $_callback = NULL;

    public function __construct(DataAttrs $dataAttrs, $callback = NULL, $htmlAttrs = array("id" => NULL, "class" => NULL)) {
        $this->_dataAttrs = $dataAttrs;
        $this->_callback = $callback;
        if(isset($htmlAttrs["id"])) $this->setId($htmlAttrs["id"]);
        isset($htmlAttrs["class"]) ? $this->setClass($htmlAttrs["class"]) : $this->setClass();
        
    }

    private function setId($id = NULL) {
        if (!empty($id)) {
            $this->_id = $id;
        }
    }

    private function setClass($class = NULL) {
        $this->_class = self::PLUSONE_BUTTON_CLASS;
        if (!empty($class)) {
            $this->_class .= " " . $class;
        }
    }
    public function getClass(){
        return $this->_class;
    }
    public function getId(){
        return $this->_id;
    }
    public function getHtml() {

        $html = '<div class="' 
        . $this->_class 
        . '" ';
        

        if (!empty($this->_id)) {
            $html .= ' id="' . $this->_id . '" ';
        }
        
        $html .= $this->_dataAttrs->getAttrs();
        if (!empty($this->_callback)) {
            $html .= ' callback="' . $this->_callback . '"';
        }
        $html .= "></div>";

        return $html;
    }
}
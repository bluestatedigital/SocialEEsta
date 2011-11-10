<?php 

class GooglePlusOne_HTML5 {
    
    const PLUSONE_BUTTON_CLASS = "g-plusone";
    private $_widget;
    private $_dataAttrs;
    private $_id;
    private $_class;
    private $_callback;
    private $_includeJS = FALSE;

    public function __construct(GoogleJS $widget, DataAttrs $dataAttrs) {
        $this->_widget = $widget;
        $this->_dataAttrs = $dataAttrs;
    }

    public function setId($id) {
        if (!is_null($id)) {
            $this->_id = $id;
        }
    }

    public function setClass($class) {
        $this->_class = self::PLUSONE_BUTTON_CLASS;
        if (!is_null($class)) {
            $this->_class .= " " . $class;
        }
    }
    public function setCallback($callback) {
        if (!is_null($callback)){
            $this->_callback = $callback;
        }
    }
    public function setIncludeJS($include) {
        $this->_includeJS = (bool) $include;
    }

    public function getHtml() {
        $html = '';

        if ($this->_includeJS) {
            $html .= $this->_widget->asyncScript();
        }

        $html .= '<div class="' 
        . $this->_class 
        . '" ';
        

        if (!is_null($this->_id)) {
            $html .= ' id="' . $this->_id . '" ';
        }
        
        $html .= $this->_dataAttrs->getAttrs();
        if (!is_null($this->_callback)) {
            $html .= ' callback="' . $this->_callback . '"';
        }
        $html .= "></div>";

        return $html;
    }
}
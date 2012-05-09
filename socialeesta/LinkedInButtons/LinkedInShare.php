<?php 

class LinkedInShareJs {
    
    const LINKED_IN_JS = "//platform.linkedin.com/in.js";
    private $_dataAttrs;
    private $_id;
    private $_class;

    public function __construct(DataAttrs $dataAttrs) {
        $this->_dataAttrs = $dataAttrs;
    }
    public function getButton(){
        return "<script type=\"IN/Share\" " . $this->_dataAttrs->getAttrs() . "></script>";
    }
    public function getJsLibrary(){
        $code = "<script>(function(d){var li = document.createElement(\"script\");\n"
                . "li.src = \"" . self::LINKED_IN_JS . "\";\n"
                . "li.async = \"true\";\n"
                . "d.getElementsByTagName(\"script\")[0].appendChild(li);\n"
                . "}(document));\n"
                . "</script>";
        return $code;
    }
    public function getJsUrl(){
        return self::LINKED_IN_JS;
    }
}
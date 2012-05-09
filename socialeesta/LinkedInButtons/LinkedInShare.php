<?php 

class LinkedInShareJs {
    
    private $_dataAttrs;

    public function __construct(DataAttrs $dataAttrs) {
        $this->_dataAttrs = $dataAttrs;
    }
    public function getButton(){
        return "<script type=\"IN/Share\" " . $this->_dataAttrs->getAttrs() . "></script>";
    }
}
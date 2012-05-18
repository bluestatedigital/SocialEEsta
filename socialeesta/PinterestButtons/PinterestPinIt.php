<?php 

class PinterestPinIt {
    
    const PINIT_BUTTON_CLASS = "pin-it-button";
    const PINIT_BUTTON_HREF = "http://pinterest.com/pin/create/button/";
    const PINIT_BUTTON_IMGSRC = "//assets.pinterest.com/images/PinExt.png";
    private $_queryString;
    private $_count;

    public function __construct(QueryString $queryString, $count) {
        $this->_queryString = $queryString;
        $this->_count = $count;
    }
    public function getCount(){
        return $this->_count;
    }
    
    public function getButton() {
        return '<a href="' . self::PINIT_BUTTON_HREF
                . $this->_queryString->getQueryString() 
                . '" class="' . self::PINIT_BUTTON_CLASS . '" count-layout="' . $this->getCount()
                . '"><img border="0" src="'. self::PINIT_BUTTON_IMGSRC . '" title="Pin It" /></a>';
    }
}
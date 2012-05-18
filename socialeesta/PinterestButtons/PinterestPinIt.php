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

//<a href="http://pinterest.com/pin/create/button/?url=url_of_the_page&media=url_of_image&description=Description%20of%20the%20thing" class="pin-it-button" count-layout="none"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>
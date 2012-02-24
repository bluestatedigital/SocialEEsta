<?php
require_once PATH_THIRD .'socialeesta/Utils/QueryString.php';
require_once PATH_THIRD .'socialeesta/FacebookButtons/FacebookLike_Iframe.php';
Mock::generate('QueryString');

class FacebookLikeIframe extends Testee_unit_test_case {
    private $_queryString;
    private $_button;
    
    public function __construct(){
        parent::__construct('Facebook Like iframe Button Test');
    }
    public function setUp(){
        parent::setUp();
        $this->_queryString = new MockQueryString();
        $this->_queryString->returns("getQueryString", "?href=www.itgetsbetter.org&send=false&layout=button_count&show-faces=false&width=450&action=like&font=lucida+grande&colorscheme=light");
    }
    public function tearDown(){
        unset($this->_queryString);
        unset($this->_button);
    }
    public function testGetIframeHeightReturns20pxByDefault(){
        $expected = "20px";
        $this->_queryString->returns('getValue', '', array('layout'));
        $this->_button = new FacebookLike_Iframe($this->_queryString);
        $this->_queryString->expectOnce('getValue', array('layout'));
        $this->assertIdentical($expected, $this->_button->getIframeHeight());
    }
    public function testGetIframeHeightReturns20pxWhenLayoutIsButtonCount(){
        $expected = "20px";
        $this->_queryString->returns('getValue', 'button_count', array('layout'));
        $this->_button = new FacebookLike_Iframe($this->_queryString);
        $this->_queryString->expectOnce('getValue', array('layout'));
        $this->assertIdentical($expected, $this->_button->getIframeHeight());
    }

    public function testGetIframeHeightReturns35pxWhenLayoutIsStandard(){
        $expected = "35px";
        $this->_queryString->returns('getValue', 'standard', array('layout'));
        $this->_button = new FacebookLike_Iframe($this->_queryString);
        $this->_queryString->expectOnce('getValue', array('layout'));
        $this->assertIdentical($expected, $this->_button->getIframeHeight());
    }
    public function testGetIframeHeightReturns65pxWhenLayoutIsBoxCount(){
        $expected = "65px";
        $this->_queryString->returns('getValue', 'box_count', array('layout'));
        $this->_button = new FacebookLike_Iframe($this->_queryString);
        $this->_queryString->expectOnce('getValue', array('layout'));
        $this->assertIdentical($expected, $this->_button->getIframeHeight());
    }
    public function testGetHtmlReturnsCorrectMarkup(){
        $expected = '<iframe src="//www.facebook.com/plugins/like.php?href=www.itgetsbetter.org&send=false&layout=button_count&show-faces=false&width=450&action=like&font=lucida+grande&colorscheme=light" allowtransparency="true" frameborder="0" scrolling="no" style="width:450px; height: 20px"></iframe>';
        $this->_queryString->returns('getValue', '', array('layout'));
        $this->_queryString->returns('getValue', '450', array('width'));
        $this->_button = new FacebookLike_Iframe($this->_queryString);
        $this->assertIdentical($expected, $this->_button->getHtml());
    }
    

}

// <iframe src="//www.facebook.com/plugins/like.php?href=www.itgetsbetter.org&send=false&layout=button_count&show-faces=false&width=450&action=like&font=lucida+grande&colorscheme=blue" allowtransparency="true" frameborder="0" scrolling="no" style="width:450px; height: 20px"></iframe>
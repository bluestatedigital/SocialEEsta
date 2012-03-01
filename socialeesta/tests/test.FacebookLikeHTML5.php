<?php
require_once PATH_THIRD .'socialeesta/Utils/DataAttrs.php';
require_once PATH_THIRD .'socialeesta/FacebookButtons/FacebookLike_HTML5.php';
Mock::generate('DataAttrs');

class FacebookLikeHTML5 extends Testee_unit_test_case {
    private $_dataAttrs;
    private $_button;
    
    public function __construct(){
        parent::__construct('Facebook Like HTML5 Button Test');
    }
    public function setUp(){
        parent::setUp();
        $this->_dataAttrs = new MockDataAttrs();
        $this->_dataAttrs->returns('getAttrs', 'data-send="false" data-layout="button_count" data-show-faces="false" data-width="450" data-action="like" data-font="lucida grande" data-colorscheme="light"');
    }
    public function tearDown(){
        unset($this->_dataAttrs);
        unset($this->_button);
    }
    public function testGetShareButtonClassReturnsConstant(){
        $expected = "fb-like";
        $this->_button = new FacebookLike_HTML5($this->_dataAttrs);
        $this->assertIdentical($expected, $this->_button->getShareButtonClass());
    }
    public function testGetCssClassReturnsShareButtonConstantByDefault(){
        $this->_button = new FacebookLike_HTML5($this->_dataAttrs);
        $expected = $this->_button->getShareButtonClass();
        $this->assertIdentical($expected, $this->_button->getCssClass());
    }
    public function testGetCssClassReturnsTemplateParam(){
        $this->_button = new FacebookLike_HTML5($this->_dataAttrs, array("class" => "socialeesta-class"));
        $expected = $this->_button->getShareButtonClass() . " socialeesta-class";
        $this->assertIdentical($expected, $this->_button->getCssClass());
    }
    public function testGetCssIdReturnsNullByDefault(){
        $expected = NULL;
        $this->_button = new FacebookLike_HTML5($this->_dataAttrs);
        $this->assertIdentical($expected, $this->_button->getCssId());
    }
    public function testGetCssIdReturnsTemplateParam(){
        $expected = "socialeesta-id";
        $this->_button = new FacebookLike_HTML5($this->_dataAttrs, array("id" => $expected));
        $this->assertIdentical($expected, $this->_button->getCssid());
    }
    public function testGetMarkupWithNoClassNoId(){
        $expected = '<div class="fb-like" data-send="false" data-layout="button_count" data-show-faces="false" data-width="450" data-action="like" data-font="lucida grande" data-colorscheme="light"></div>';
        $this->_button = new FacebookLike_HTML5($this->_dataAttrs);
        $this->assertIdentical($expected, $this->_button->getHtml());
    }
    public function testGetMarkupWithClassNoId(){
        $expected = '<div class="fb-like socialeesta-class" data-send="false" data-layout="button_count" data-show-faces="false" data-width="450" data-action="like" data-font="lucida grande" data-colorscheme="light"></div>';
        $this->_button = new FacebookLike_HTML5($this->_dataAttrs, array("class" => "socialeesta-class"));
        $this->assertIdentical($expected, $this->_button->getHtml());
    }
    public function testGetMarkupWithIdNoClass(){
        $expected = '<div class="fb-like" id="socialeesta-id" data-send="false" data-layout="button_count" data-show-faces="false" data-width="450" data-action="like" data-font="lucida grande" data-colorscheme="light"></div>';
        $this->_button = new FacebookLike_HTML5($this->_dataAttrs, array("id" => "socialeesta-id"));
        $this->assertIdentical($expected, $this->_button->getHtml());
    }
    public function testGetMarkupWithIdAndClass(){
        $expected = '<div class="fb-like socialeesta-class" id="socialeesta-id" data-send="false" data-layout="button_count" data-show-faces="false" data-width="450" data-action="like" data-font="lucida grande" data-colorscheme="light"></div>';
        $this->_button = new FacebookLike_HTML5($this->_dataAttrs, array("id" => "socialeesta-id", "class" => "socialeesta-class"));
        $this->assertIdentical($expected, $this->_button->getHtml());
    }
}
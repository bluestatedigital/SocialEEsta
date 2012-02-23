<?php
require_once PATH_THIRD .'socialeesta/Utils/DataAttrs.php';
require_once PATH_THIRD .'socialeesta/TwitterButtons/Follow_JS.php';
Mock::generate('DataAttrs');

class TwitterFollowJs extends Testee_unit_test_case {
    private $_button;
    
    
    public function __construct(){
        parent::__construct('Follow Button JS class test');
    }
    public function setUp(){
        $this->_dataAttrs = new MockDataAttrs();
        $this->_dataAttrs->returns('getAttrs', 'data-url="http://www.bluestatedigital.com/" data-text="Check out my website!" data-count="vertical" data-lang="en" data-size="large"');

    }
    public function tearDown(){
       unset($this->_button);
       unset($this->_dataAttrs);
    }
    public function testFollowButtonCssClassReturnsDefault(){
        $this->_button = new Follow_JS($this->_dataAttrs);
        $expected = $this->_button->getShareButtonClass();
        $this->assertIdentical($expected, $this->_button->getCssClass());
        
    }
    public function testFollowButtonCssClassReturnsTemplateParam(){
        $this->_button = new Follow_JS($this->_dataAttrs, array("class" => "socialeesta-test-class"));
        $expected = $this->_button->getShareButtonClass() . " socialeesta-test-class";
        $this->assertIdentical($expected, $this->_button->getCssClass());
        
    }
    public function testFollowButtonCssIdReturnsNullByDefault(){
        $this->_button = new Follow_JS($this->_dataAttrs);
        $expected = NULL;
        $this->assertIdentical($expected, $this->_button->getCssId());
        
    }
    public function testFollowButtonCssIdReturnsTemplateParam(){
        $this->_button = new Follow_JS($this->_dataAttrs, array("id" => "socialeesta-test-id"));
        $expected = "socialeesta-test-id";
        $this->assertIdentical($expected, $this->_button->getCssId());
        
    }
    public function testGetTwitterUrl(){
        $this->_button = new Follow_JS($this->_dataAttrs);
        $expected = "https://twitter.com/";
        $this->assertIdentical($expected, $this->_button->getTwitterUrl());
    }
    public function testFollowButtonMarkupWithNoIdNoClass(){
        $this->_button = new Follow_JS($this->_dataAttrs);
        $this->_dataAttrs->returns('fetchAttr', 'bsdwire', array('screen-name'));
        $expected = '<a href="' . $this->_button->getTwitterUrl() . 'bsdwire" data-url="http://www.bluestatedigital.com/" data-text="Check out my website!" data-count="vertical" data-lang="en" data-size="large" class="twitter-follow-button">Follow @bsdwire</a>';
        $this->assertIdentical($expected, $this->_button->getHtml());
        
    }
    public function testFollowButtonMarkupWithIdNoClass(){
        $this->_button = new Follow_JS($this->_dataAttrs, array("id" => "socialeesta-test-id"));
        $this->_dataAttrs->returns('fetchAttr', 'bsdwire', array('screen-name'));
        $expected = '<a href="' . $this->_button->getTwitterUrl() . 'bsdwire" data-url="http://www.bluestatedigital.com/" data-text="Check out my website!" data-count="vertical" data-lang="en" data-size="large" id="socialeesta-test-id" class="twitter-follow-button">Follow @bsdwire</a>';
        $this->assertIdentical($expected, $this->_button->getHtml());
    }
    public function testFollowButtonMarkupWithClassNoId(){
        $this->_button = new Follow_JS($this->_dataAttrs, array("class" => "socialeesta-test-class"));
        $this->_dataAttrs->returns('fetchAttr', 'bsdwire', array('screen-name'));
        $expected = '<a href="' . $this->_button->getTwitterUrl() . 'bsdwire" data-url="http://www.bluestatedigital.com/" data-text="Check out my website!" data-count="vertical" data-lang="en" data-size="large" class="twitter-follow-button socialeesta-test-class">Follow @bsdwire</a>';
        $this->assertIdentical($expected, $this->_button->getHtml());
    }
    public function testFollowButtonMarkupWithIdAndClass(){
        $this->_button = new Follow_JS($this->_dataAttrs, array("class" => "socialeesta-test-class", "id" => "socialeesta-test-id"));
        $this->_dataAttrs->returns('fetchAttr', 'bsdwire', array('screen-name'));
        $expected = '<a href="' . $this->_button->getTwitterUrl() . 'bsdwire" data-url="http://www.bluestatedigital.com/" data-text="Check out my website!" data-count="vertical" data-lang="en" data-size="large" id="socialeesta-test-id" class="twitter-follow-button socialeesta-test-class">Follow @bsdwire</a>';
        $this->assertIdentical($expected, $this->_button->getHtml());
    }
   // >Follow @" . $this->_dataAttrs->fetchAttr("screen-name") . "</a>";
}
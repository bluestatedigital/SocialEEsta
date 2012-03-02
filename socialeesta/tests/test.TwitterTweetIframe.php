<?php
require_once PATH_THIRD .'socialeesta/Utils/QueryString.php';
require_once PATH_THIRD .'socialeesta/TwitterButtons/Tweet_Iframe.php';
Mock::generate('QueryString');

class TwitterTweetIframe extends Testee_unit_test_case {
    private $_tweetButton;
    
    
    public function __construct(){
        parent::__construct('Tweet Button iframe class test');
    }
    public function setUp(){
        $this->_queryString = new MockQueryString();
        $this->_queryString->returns('getQueryString', "?text=Check%20out%20my%20website%21&count=horizontal&related=bsdtools%2Cbsdwire%3ABlue%20State%20Digital&lang=en&size=medium");
        
    }
    public function tearDown(){
       unset($this->_tweetButton);
       unset($this->_queryString);
    }
    
    public function testTweetButtonIframeWithDefaultHeight(){
        $this->_queryString->returns('getValue', 'horizontal', array("count"));
        $this->_tweetButton = new Tweet_Iframe($this->_queryString);
        $expectedQueryString = "?text=Check%20out%20my%20website%21&count=horizontal&related=bsdtools%2Cbsdwire%3ABlue%20State%20Digital&lang=en&size=medium";
        $expected = '<iframe allowtransparency="true" frameborder="0" scrolling="no" src="'
                    . $this->_tweetButton->getIframeUrl() . $expectedQueryString
                    . '" style="width:130px; height:20px;"></iframe>';
        $this->_queryString->expectOnce('getQueryString');
        $this->_queryString->expectOnce('getValue', array("count"));
        $this->assertIdentical($expected, $this->_tweetButton->getHtml());
        
    }
    public function testTweetButtonIframeWithVerticalHeight(){
        $this->_queryString->returns('getValue', 'vertical', array("count"));
        $this->_tweetButton = new Tweet_Iframe($this->_queryString);
        $expectedQueryString = "?text=Check%20out%20my%20website%21&count=horizontal&related=bsdtools%2Cbsdwire%3ABlue%20State%20Digital&lang=en&size=medium";
        $expected = '<iframe allowtransparency="true" frameborder="0" scrolling="no" src="'
                    . $this->_tweetButton->getIframeUrl() . $expectedQueryString
                    . '" style="width:130px; height:62px;"></iframe>';
        $this->_queryString->expectOnce('getQueryString');
        $this->_queryString->expectOnce('getValue', array("count"));
        $this->assertIdentical($expected, $this->_tweetButton->getHtml());
        
    }
   
}
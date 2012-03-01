<?php
require_once PATH_THIRD .'socialeesta/Utils/QueryString.php';
require_once PATH_THIRD .'socialeesta/TwitterButtons/Follow_Iframe.php';
Mock::generate('QueryString');

class TwitterFollowIframe extends Testee_unit_test_case {
    private $_button;
    
    
    public function __construct(){
        parent::__construct('Follow Button iframe class test');
    }
    public function setUp(){
        $this->_queryString = new MockQueryString();
        $this->_queryString->returns('getQueryString', "?screen_name=bsd_wire&show_count=true&show_screen_name=false&lang=en&size=medium");
        
    }
    public function tearDown(){
       unset($this->_button);
       unset($this->_queryString);
    }
    public function testGetIframeUrlReturnsCorrectUrl(){
        $expected = "//platform.twitter.com/widgets/follow_button.html";
        $this->_button = new Follow_Iframe($this->_queryString, "200px");
        $this->assertIdentical($expected, $this->_button->getIframeUrl());
    }
    public function testGetHtmlReturnsCorrectMarkup(){
        // Based on <iframe allowtransparency="true" frameborder="0" scrolling="no" src="//platform.twitter.com/widgets/tweet_button.html?text=Check+out+my+website%21&count=horizontal&related=bsdtools%2Cbsdwire%3ABlue+State+Digital&lang=en&size=medium" style="width:130px; height:20px;"></iframe>
        $expected = '<iframe allowtransparency="true" frameborder="0" scrolling="no" src="//platform.twitter.com/widgets/follow_button.html?screen_name=bsd_wire&show_count=true&show_screen_name=false&lang=en&size=medium" style="width:300px; height:20px;"></iframe>';
        $this->_button = new Follow_Iframe($this->_queryString, "300px");
        $this->assertIdentical($expected, $this->_button->getHtml());
    }
    
  
}


//<iframe allowtransparency="true" frameborder="0" scrolling="no" src="//platform.twitter.com/widgets/tweet_button.html?text=Check+out+my+website%21&count=horizontal&related=bsdtools%2Cbsdwire%3ABlue+State+Digital&lang=en&size=medium" style="width:130px; height:20px;"></iframe>
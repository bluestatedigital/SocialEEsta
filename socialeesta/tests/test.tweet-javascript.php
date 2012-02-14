<?php
require_once PATH_THIRD .'socialeesta/Utils/DataAttrs.php';
require_once PATH_THIRD .'socialeesta/TwitterButtons/Tweet_JS.php';
Mock::generate('DataAttrs');

class TweetButton_Javascript extends Testee_unit_test_case() {
    private $_tweetButton;
    
    
    public function __construct(){
        parent::__construct('Tweet Button JS class test');
    }
    public function setUp(){
        $this->_tweetButton = new Tweet_JS();
        $this->_dataAttrs = new MockDataAttrs();
        $this->_dataAttrs->returns('getAttrs', 'data-url="http://www.bluestatedigital.com/" data-text="Check out my website!" data-count="vertical" data-lang="en" data-size="large" class="twitter-share-button"');
    }
    public function tearDown(){
       unset($this->_tweetButton);
    }
    
    
   
}
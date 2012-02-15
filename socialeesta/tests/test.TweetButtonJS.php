<?php
require_once PATH_THIRD .'socialeesta/Utils/DataAttrs.php';
require_once PATH_THIRD .'socialeesta/TwitterButtons/Tweet_JS.php';
Mock::generate('DataAttrs');

class TweetButton_Javascript extends Testee_unit_test_case {
    private $_tweetButton;
    
    
    public function __construct(){
        parent::__construct('Tweet Button JS class test');
    }
    public function setUp(){
        $this->_dataAttrs = new MockDataAttrs();
        $this->_dataAttrs->returns('getAttrs', 'data-url="http://www.bluestatedigital.com/" data-text="Check out my website!" data-count="vertical" data-lang="en" data-size="large"');

    }
    public function tearDown(){
       unset($this->_tweetButton);
       unset($this->_dataAttrs);
    }
    
    public function testTweetButtonCssId(){
        $this->_tweetButton = new Tweet_JS($this->_dataAttrs, "tweet-test-id", "tweet-test-class");
        $this->assertIdentical("tweet-test-id", $this->_tweetButton->getId());
    }
    public function testTweetButtonCssClass(){
        $this->_tweetButton = new Tweet_JS($this->_dataAttrs, "tweet-test-id", "tweet-test-class");
        $this->assertIdentical("twitter-share-button tweet-test-class", $this->_tweetButton->getClass());
    }
    public function testTweetButtonCssClassDefault(){
        $this->_tweetButton = new Tweet_JS($this->_dataAttrs, "tweet-test-id");
        $this->assertIdentical("twitter-share-button", $this->_tweetButton->getClass());
    }
    public function testTweetButtonMarkupIsCorrect(){
        $expectedMarkup = '<a href="http://twitter.com/share" data-url="http://www.bluestatedigital.com/" data-text="Check out my website!" data-count="vertical" data-lang="en" data-size="large" class="twitter-share-button">Tweet</a>';
        $this->_tweetButton = new Tweet_JS($this->_dataAttrs);
        $this->assertIdentical($expectedMarkup, $this->_tweetButton->getHtml());
    }
    public function testTweetButtonMarkupIsCorrectWithClass(){
        $expectedMarkup = '<a href="http://twitter.com/share" data-url="http://www.bluestatedigital.com/" data-text="Check out my website!" data-count="vertical" data-lang="en" data-size="large" class="twitter-share-button socialeesta-share">Tweet</a>';
        $this->_tweetButton = new Tweet_JS($this->_dataAttrs, NULL, "socialeesta-share");
        $this->assertIdentical($expectedMarkup, $this->_tweetButton->getHtml());
        
    }
    public function testTweetButtonMarkupIsCorrectWithId(){
        $expectedMarkup = '<a href="http://twitter.com/share" data-url="http://www.bluestatedigital.com/" data-text="Check out my website!" data-count="vertical" data-lang="en" data-size="large" id="socialeesta-share" class="twitter-share-button">Tweet</a>';
        $this->_tweetButton = new Tweet_JS($this->_dataAttrs, "socialeesta-share");
        $this->assertIdentical($expectedMarkup, $this->_tweetButton->getHtml());
    }
   
}
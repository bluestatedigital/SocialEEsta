<?php
require_once PATH_THIRD .'socialeesta/Utils/DataAttrs.php';
require_once PATH_THIRD .'socialeesta/TwitterButtons/Tweet_JS.php';
Mock::generate('DataAttrs');

class FollowButtonJsTest extends Testee_unit_test_case {
    private $_button;
    
    
    public function __construct(){
        parent::__construct('Follow Button JS class test');
    }
    public function setUp(){
        $this->_dataAttrs = new MockDataAttrs();
        $this->_dataAttrs->returns('getAttrs', 'data-screen-name="bsdwire" data-show-screen-name="false" data-show-count="true" data-lang="en" data-width="300" data-size="medium" class="twitter-follow-button"');

    }
    public function tearDown(){
       unset($this->_button);
       unset($this->_dataAttrs);
    }
    
    
   
}
<?php
require_once PATH_THIRD .'socialeesta/Utils/DataAttrs.php';
require_once PATH_THIRD .'socialeesta/LinkedInButtons/LinkedInShare.php';
Mock::generate('DataAttrs');

class LinkedInShareJsTest extends Testee_unit_test_case {
    private $_button;
    
    
    public function __construct(){
        parent::__construct('LinkedIn Share Button JS class test');
    }
    public function setUp(){
        $this->_dataAttrs = new MockDataAttrs();
        $this->_dataAttrs->returns('getAttrs', 'data-url="http://www.bluestatedigital.com/" data-counter="top"');
        $this->_button = new LinkedInShareJs($this->_dataAttrs);
        
    }
    public function tearDown(){
       unset($this->_button);
       unset($this->_dataAttrs);
    }
    public function testGetButtonReturnsCorrectMarkup(){
        $expected = "<script type=\"IN/Share\" data-url=\"http://www.bluestatedigital.com/\" data-counter=\"top\"></script>";
        $this->assertIdentical($expected, $this->_button->getButton());
    }
}
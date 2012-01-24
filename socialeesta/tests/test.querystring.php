<?php 
require_once PATH_THIRD .'socialeesta/Utils/QueryString.php';

class TestQueryString extends Testee_unit_test_case {

    private $_queryString;
    
    public function __construct(){
        parent::__construct('QueryString class test');

    }
    public function setUp(){
        $this->_queryString = new QueryString();
        $this->_queryString->addParam("foo","bar");
   }
   public function tearDown(){
       unset($this->_queryString);
   }
    public function testMakeQueryString(){
        $this->assertTrue(get_class($this->_queryString) === "QueryString");
    }
    public function testReadAttributeFromQueryString(){
        $this->assertTrue($this->_queryString->getValue("foo") === "bar");
    }
    public function testQueryStringIsReturned(){
        $this->assertTrue($this->_queryString->getQueryString() === "?foo=bar");
    }
}
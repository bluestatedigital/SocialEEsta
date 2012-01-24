<?php 
require_once PATH_THIRD .'socialeesta/Utils/DataAttrs.php';

class TestDataAttrsClass extends Testee_unit_test_case {

    private $_dataAttrs;
    
    public function __construct(){
        parent::__construct('DataAttr class test');
    }
    public function setUp(){
        $this->_dataAttrs = new DataAttrs();
        $this->_dataAttrs->addAttr("foo","bar");

    }
    public function tearDown(){
        unset($this->_dataAttrs);
    }
    
    public function testMakeDataAttrs(){
        $this->assertTrue(get_class($this->_dataAttrs) === "DataAttrs");
    }
    public function testReadAttributeFromDataAttrs(){
        $this->assertTrue($this->_dataAttrs->fetchAttr("foo") === "bar");
    }
    public function testDataAttrsAreReturned(){
        $this->assertTrue($this->_dataAttrs->getAttrs() === 'data-foo="bar"');
    }
}
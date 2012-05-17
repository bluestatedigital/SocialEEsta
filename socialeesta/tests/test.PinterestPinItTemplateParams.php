<?php
require_once PATH_THIRD .'socialeesta/TemplateParams/PinterestPinIt.php';

class PinterestPinItTemplateParams extends Testee_unit_test_case {
    private $_params;

    
    public function __construct(){
        parent::__construct('Pinterest Pin It Template Params class test');
    }
    public function setUp(){
        parent::setUp();
        $this->_params = new TemplateParams_PinterestPinIt($this->EE->TMPL);
    }
    public function tearDown(){
        unset($this->_params);
    }
    public function testGetUrlReturnsEmptyStringByDefault(){
        $expected = "";
        $this->EE->TMPL->returns('fetch_param', '', array('url'));
        $this->EE->TMPL->expectOnce('fetch_param', array('url'));
        $this->assertIdentical($expected, $this->_params->getUrl());
    }
    public function testGetUrlReturnsTemplateParam(){
        $expected = "http://www.bluestatedigital.com/";
        $this->EE->TMPL->returns('fetch_param', $expected, array('url'));
        $this->EE->TMPL->expectOnce('fetch_param', array('url'));
        $this->assertIdentical($expected, $this->_params->getUrl());
    }
    public function testGetMediaReturnsEmptyStringByDefault(){
        $expected = "";
        $this->EE->TMPL->returns('fetch_param', '', array('media'));
        $this->EE->TMPL->expectOnce('fetch_param', array('media'));
        $this->assertIdentical($expected, $this->_params->getMedia());
    }
    public function testGetMediaReturnsTemplateParam(){
        $expected = "http://www.bluestatedigital.com/";
        $this->EE->TMPL->returns('fetch_param', $expected, array('media'));
        $this->EE->TMPL->expectOnce('fetch_param', array('media'));
        $this->assertIdentical($expected, $this->_params->getMedia());
    }
    public function testGetDescriptionReturnsEmptyStringByDefault(){
        $expected = "";
        $this->EE->TMPL->returns('fetch_param', '', array('description'));
        $this->EE->TMPL->expectOnce('fetch_param', array('description'));
        $this->assertIdentical($expected, $this->_params->getDescription());
    }
    public function testGetDescriptionReturnsTemplateParam(){
        $expected = "http://www.bluestatedigital.com/";
        $this->EE->TMPL->returns('fetch_param', $expected, array('description'));
        $this->EE->TMPL->expectOnce('fetch_param', array('description'));
        $this->assertIdentical($expected, $this->_params->getDescription());
    }
    public function testGetCountReturnsNoneByDefault(){
        $expected = "none";
        $this->EE->TMPL->returns('fetch_param', '', array('count'));
        $this->EE->TMPL->expectAtLeastOnce('fetch_param', array('count'));
        $this->assertIdentical($expected, $this->_params->getCount());
    }
    public function testGetCountReturnsTemplateParam(){
        $expected = "vertical";
        $this->EE->TMPL->returns('fetch_param', $expected, array('count'));
        $this->EE->TMPL->expectAtLeastOnce('fetch_param', array('count'));
        $this->assertIdentical($expected, $this->_params->getCount());
    }
}
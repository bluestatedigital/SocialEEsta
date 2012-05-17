<?php
require_once PATH_THIRD .'socialeesta/TemplateParams/LinkedInShare.php';

class LinkedInTemplateParams extends Testee_unit_test_case {
    private $_params;

    
    public function __construct(){
        parent::__construct('LinkedIn Share Template Params class test');
    }
    public function setUp(){
        parent::setUp();
        $this->_params = new TemplateParams_LinkedInShare($this->EE->TMPL);
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
    public function testGetSuccessCallbackReturnsEmptyStringByDefault(){
        $expected = "";
        $this->EE->TMPL->returns('fetch_param', '', array('on_success'));
        $this->EE->TMPL->expectOnce('fetch_param', array('on_success'));
        $this->assertIdentical($expected, $this->_params->getSuccessCallback());
    }
    public function testGetSuccessCallbackReturnsTemplateParam(){
        $expected = "foo";
        $this->EE->TMPL->returns('fetch_param', $expected, array('on_success'));
        $this->EE->TMPL->expectOnce('fetch_param', array('on_success'));
        $this->assertIdentical($expected, $this->_params->getSuccessCallback());
    }
    public function testGetErrorCallbackReturnsEmptyStringByDefault(){
        $expected = "";
        $this->EE->TMPL->returns('fetch_param', '', array('on_error'));
        $this->EE->TMPL->expectOnce('fetch_param', array('on_error'));
        $this->assertIdentical($expected, $this->_params->getErrorCallback());
    }
    public function testGetErrorCallbackReturnsTemplateParam(){
        $expected = "foo";
        $this->EE->TMPL->returns('fetch_param', $expected, array('on_error'));
        $this->EE->TMPL->expectOnce('fetch_param', array('on_error'));
        $this->assertIdentical($expected, $this->_params->getErrorCallback());
    }
    public function testGetCounterReturnsEmptyStringByDefault(){
        $expected = "";
        $this->EE->TMPL->returns('fetch_param', '', array('counter'));
        $this->EE->TMPL->expectOnce('fetch_param', array('counter'));
        $this->assertIdentical($expected, $this->_params->getCounter());
    }
    public function testGetCounterReturnsTemplateParam(){
        $expected = "top";
        $this->EE->TMPL->returns('fetch_param', $expected, array('counter'));
        $this->EE->TMPL->expectOnce('fetch_param', array('counter'));
        $this->assertIdentical($expected, $this->_params->getCounter());
    }
    public function testGetShowZeroReturnsEmptyStringByDefault(){
        $expected = "";
        $this->EE->TMPL->returns('fetch_param', '', array('show_zero'));
        $this->EE->TMPL->expectOnce('fetch_param', array('show_zero'));
        $this->assertIdentical($expected, $this->_params->getShowZero());
    }
    public function testGetShowZeroReturnsTemplateParam(){
        $expected = "true";
        $this->EE->TMPL->returns('fetch_param', $expected, array('show_zero'));
        $this->EE->TMPL->expectOnce('fetch_param', array('show_zero'));
        $this->assertIdentical($expected, $this->_params->getShowZero());
    }
}
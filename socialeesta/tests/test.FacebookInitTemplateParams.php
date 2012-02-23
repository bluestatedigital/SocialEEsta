<?php
require_once PATH_THIRD .'socialeesta/TemplateParams/FacebookInit.php';

class FacebookInitTemplateParams extends Testee_unit_test_case {
    private $_params;

    
    public function __construct(){
        parent::__construct('Facebook Like Template Params class test');
    }
    public function setUp(){
        parent::setUp();
        $this->_params = new FacebookInit($this->EE->TMPL);
    }
    public function tearDown(){
        unset($this->_params);
    }
    public function testGetChannelUrlReturnsEmptyStringByDefault(){
        $expected = "";
        $this->EE->TMPL->returns('fetch_param', '', array('channel_url'));
        $this->EE->TMPL->expectOnce('fetch_param', array('channel_url'));
        $this->assertIdentical($expected, $this->_params->getChannelUrl());
    }
    public function testGetChannelUrlReturnsTemplateParam(){
        $expected = "http://www.bluestatedigital.com/path/to/channel.html";
        $this->EE->TMPL->returns('fetch_param', $expected, array('channel_url'));
        $this->EE->TMPL->expectOnce('fetch_param', array('channel_url'));
        $this->assertIdentical($expected, $this->_params->getChannelUrl());
    }
    public function testGetStatusRetunsTrueByDefault(){
        $expected = "true";
        $this->EE->TMPL->returns('fetch_param', '', array('status'));
        $this->EE->TMPL->expectAtLeastOnce('fetch_param', array('status'));
        $this->assertIdentical($expected, $this->_params->getStatus());
    }
    public function getStatusReturnsTemplateParam(){
        $expected = "false";
        $this->EE->TMPL->returns('fetch_param', $expected, array('status'));
        $this->EE->TMPL->expectAtLeastOnce('fetch_param', array('status'));
        $this->assertIdentical($expected, $this->_params->getStatus());
        
    }
    public function testGetCookieReturnsTrueByDefault(){
        $expected = "true";
        $this->EE->TMPL->returns('fetch_param', '', array('cookie'));
        $this->EE->TMPL->expectAtLeastOnce('fetch_param', array('cookie'));
        $this->assertIdentical($expected, $this->_params->getCookie());
        
    }
    public function testGetCookieReturnsTemplateParam(){
        $expected = "false";
        $this->EE->TMPL->returns('fetch_param', $expected, array('cookie'));
        $this->EE->TMPL->expectAtLeastOnce('fetch_param', array('cookie'));
        $this->assertIdentical($expected, $this->_params->getCookie());
        
    }
    public function testGetOauthReturnsTrueByDefault(){
        $expected = "true";
        $this->EE->TMPL->returns('fetch_param', '', array('oauth'));
        $this->EE->TMPL->expectAtLeastOnce('fetch_param', array('oauth'));
        $this->assertIdentical($expected, $this->_params->getOauth());
        
    }
    public function testGetOauthReturnsTemplateParam(){
        $expected = "false";
        $this->EE->TMPL->returns('fetch_param', $expected, array('oauth'));
        $this->EE->TMPL->expectAtLeastOnce('fetch_param', array('oauth'));
        $this->assertIdentical($expected, $this->_params->getOauth());
        
    }
    public function testGetXfbmlReturnsTrueByDefault(){
        $expected = "true";
        $this->EE->TMPL->returns('fetch_param', '', array('xfbml'));
        $this->EE->TMPL->expectAtLeastOnce('fetch_param', array('xfbml'));
        $this->assertIdentical($expected, $this->_params->xfbml());
        
    }
    public function testGetXfbmlReturnsTemplateParam(){
        $expected = "false";
        $this->EE->TMPL->returns('fetch_param', $expected, array('xfbml'));
        $this->EE->TMPL->expectAtLeastOnce('fetch_param', array('xfbml'));
        $this->assertIdentical($expected, $this->_params->xfbml());
        
    }
}
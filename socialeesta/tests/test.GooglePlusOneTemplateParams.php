<?php
require_once PATH_THIRD .'socialeesta/TemplateParams/GooglePlusOne.php';

class GooglePlusOneTemplateParams extends Testee_unit_test_case {
    private $_params;

    
    public function __construct(){
        parent::__construct('Google +1 Template Params class test');
    }
    public function setUp(){
        parent::setUp();
        $this->_params = new TemplateParams_GooglePlusOne($this->EE->TMPL);
    }
    public function tearDown(){
        unset($this->_params);
    }
    public function testGetHrefReturnsEmptyStringByDefault(){
        $expected = "";
        $this->EE->TMPL->returns('fetch_param', '', array('href'));
        $this->EE->TMPL->expectOnce('fetch_param', array('href'));
        $this->assertIdentical($expected, $this->_params->getHref());
    }
    public function testGetHrefReturnsTemplateParam(){
        $expected = "http://www.bluestatedigital.com/";
        $this->EE->TMPL->returns('fetch_param', $expected, array('href'));
        $this->EE->TMPL->expectOnce('fetch_param', array('href'));
        $this->assertIdentical($expected, $this->_params->getHref());
    }
    public function testGetSizeRetunsMediumByDefault(){
        $expected = "medium";
        $this->EE->TMPL->returns('fetch_param', '', array('size'));
        $this->EE->TMPL->expectAtLeastOnce('fetch_param', array('size'));
        $this->assertIdentical($expected, $this->_params->getSize());
    }
    public function testGetSizeReturnsTemplateParam(){
        $expected = "large";
        $this->EE->TMPL->returns('fetch_param', 'large', array('size'));
        $this->EE->TMPL->expectAtLeastOnce('fetch_param', array('size'));
        $this->assertIdentical($expected, $this->_params->getSize());
    }
    public function testGetAnnotationReturnsBubbleByDefault(){
        $expected = "bubble";
        $this->EE->TMPL->returns('fetch_param', '', array('annotation'));
        $this->EE->TMPL->expectAtLeastOnce('fetch_param', array('annotation'));
        $this->assertIdentical($expected, $this->_params->getAnnotation());
    }
    public function testGetAnnotationReturnsTemplateParam(){
        $expected = "inline";
        $this->EE->TMPL->returns('fetch_param', 'inline', array('annotation'));
        $this->EE->TMPL->expectAtLeastOnce('fetch_param', array('annotation'));
        $this->assertIdentical($expected, $this->_params->getAnnotation());
    }
    public function testGetWidthReturnsEmptyStringByDefault(){
        $expected = "";
        $this->EE->TMPL->returns('fetch_param', '', array('width'));
        $this->EE->TMPL->expectOnce('fetch_param', array('width'));
        $this->assertIdentical($expected, $this->_params->getWidth());
    }
    public function testGetWidthReturnsTemplateParam(){
        $expected = "200";
        $this->EE->TMPL->returns('fetch_param', $expected, array('width'));
        $this->EE->TMPL->expectOnce('fetch_param', array('width'));
        $this->assertIdentical($expected, $this->_params->getWidth());
    }
    public function testGetJsCallbackReturnsEmptyStringByDefault(){
        $expected = "";
        $this->EE->TMPL->returns('fetch_param', '', array('callback'));
        $this->EE->TMPL->expectOnce('fetch_param', array('callback'));
        $this->assertIdentical($expected, $this->_params->getJsCallback());
    }
    public function testGetJsCallbackReturnsTemplateParam(){
        $expected = "socialeesta-callback";
        $this->EE->TMPL->returns('fetch_param', $expected, array('callback'));
        $this->EE->TMPL->expectOnce('fetch_param', array('callback'));
        $this->assertIdentical($expected, $this->_params->getJsCallback());
    }
    public function testGetCssClassReturnsEmptyStringByDefault(){
        $expected = "";
        $this->EE->TMPL->returns('fetch_param', '', array('class'));
        $this->EE->TMPL->expectOnce('fetch_param', array('class'));
        $this->assertIdentical($expected, $this->_params->getCssClass());
    }
    public function testGetCssClassReturnsTemplateParam(){
        $expected = "socialeesta-class";
        $this->EE->TMPL->returns('fetch_param', $expected, array('class'));
        $this->EE->TMPL->expectOnce('fetch_param', array('class'));
        $this->assertIdentical($expected, $this->_params->getCssClass());
    }
    public function testGetCssIdReturnsEmptyStringByDefault(){
        $expected = "";
        $this->EE->TMPL->returns('fetch_param', '', array('id'));
        $this->EE->TMPL->expectOnce('fetch_param', array('id'));
        $this->assertIdentical($expected, $this->_params->getCssId());
    }
    public function testGetCssIdReturnsTemplateParam(){
        $expected = "socialeesta-class";
        $this->EE->TMPL->returns('fetch_param', $expected, array('id'));
        $this->EE->TMPL->expectOnce('fetch_param', array('id'));
        $this->assertIdentical($expected, $this->_params->getCssId());
    }
    public function testGetActionReturnsEmptyStringByDefault(){
        $expected = "";
        $this->EE->TMPL->returns('fetch_param', '', array('action'));
        $this->EE->TMPL->expectAtLeastOnce('fetch_param', array('action'));
        $this->assertIdentical($expected, $this->_params->getAction());
    }
    public function testGetActionReturnsTemplateParam(){
        $expected = "share";
        $this->EE->TMPL->returns('fetch_param', $expected, array('action'));
        $this->EE->TMPL->expectAtLeastOnce('fetch_param', array('action'));
        $this->assertIdentical($expected, $this->_params->getAction());
    }
}
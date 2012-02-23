<?php
require_once PATH_THIRD .'socialeesta/TemplateParams/FacebookLike.php';

class FacebookLikeTemplateParams extends Testee_unit_test_case {
    private $_params;

    
    public function __construct(){
        parent::__construct('Facebook Like Template Params class test');
    }
    public function setUp(){
        parent::setUp();
        $this->_params = new TemplateParams_FacebookLike($this->EE->TMPL);
    }
    public function tearDown(){
        unset($this->_params);
    }
    
    public function testGetTypeReturnsHtml5ByDefault(){
        $this->EE->TMPL->returns('fetch_param', '', array('type'));
        $this->EE->TMPL->expectAtLeastOnce('fetch_param', array('type'));
        $this->assertIdentical('html5', $this->_params->getType());
    }
    public function testGetTypeReturnsTemplateParam(){
        $this->EE->TMPL->returns('fetch_param', 'iframe', array('type'));
        $this->EE->TMPL->expectAtLeastOnce('fetch_param', array('type'));
        $this->assertIdentical('iframe', $this->_params->getType());
    }
    public function testGetHrefReturnsNothingByDefault(){
        $this->EE->TMPL->returns('fetch_param', '', array('href'));
        $this->EE->TMPL->expectOnce('fetch_param', array('href'));
        $this->assertIdentical('', $this->_params->getHref());
    }
    public function testGetHrefReturnsTemplateParam(){
        $expected = "http://www.bluestatedigital.com";
        $this->EE->TMPL->returns('fetch_param', 'http://www.bluestatedigital.com', array('href'));
        $this->EE->TMPL->expectOnce('fetch_param', array('href'));
        $this->assertIdentical($expected, $this->_params->getHref());
        
    }
    public function testGetSendReturnsFalseByDefault(){
        $this->EE->TMPL->returns('fetch_param', '', array('send'));
        $this->EE->TMPL->expectOnce('fetch_param', array('send'));
        $this->assertIdentical("false", $this->_params->getSend());
    }
    public function testGetSendReturnsTemplateParam(){
        $expected = "true";
        $this->EE->TMPL->returns('fetch_param', 'true', array('send'));
        $this->EE->TMPL->expectAtLeastOnce('fetch_param', array('send'));
        $this->assertIdentical($expected, $this->_params->getSend());
    }
    public function testGetLayoutReturnsButtonCountByDefault(){
        $expected = "button_count";
        $this->EE->TMPL->returns('fetch_param', 'button_count', array('layout'));
        $this->EE->TMPL->expectAtLeastOnce('fetch_param', array('layout'));
        $this->assertIdentical($expected, $this->_params->getLayout());
    }
    public function testGetLayoutReturnsTemplateParam(){
        $expected = "box_count";
        $this->EE->TMPL->returns('fetch_param', $expected, array('layout'));
        $this->EE->TMPL->expectAtLeastOnce('fetch_param', array('layout'));
        $this->assertIdentical($expected, $this->_params->getLayout());
    }
    public function testGetShowFacesReturnsFalseByDefault(){
        $expected = "false";
        $this->EE->TMPL->returns('fetch_param', '', array('show_faces'));
        $this->EE->TMPL->expectAtLeastOnce('fetch_param', array('show_faces'));
        $this->assertIdentical($expected, $this->_params->getShowFaces());
        
    }
    public function testGetShowFacesReturnsTemplateParam(){
        $expected = "true";
        $this->EE->TMPL->returns('fetch_param', $expected, array('show_faces'));
        $this->EE->TMPL->expectAtLeastOnce('fetch_param', array('show_faces'));
        $this->assertIdentical($expected, $this->_params->getShowFaces());
    }
    public function testGetWidthReturns450ByDefault(){
        $expected = "450";
        $this->EE->TMPL->returns('fetch_param', '', array('width'));
        $this->EE->TMPL->expectAtLeastOnce('fetch_param', array('width'));
        $this->assertIdentical($expected, $this->_params->getWidth());
    }
    public function testGetWidthReturnsTemplateParam(){
        $expected = "250";
        $this->EE->TMPL->returns('fetch_param', $expected, array('width'));
        $this->EE->TMPL->expectAtLeastOnce('fetch_param', array('width'));
        $this->assertIdentical($expected, $this->_params->getWidth());
        
    }
    public function testGetActionReturnsLikeByDefault(){
        $expected = "like";
        $this->EE->TMPL->returns('fetch_param', '', array('action'));
        $this->EE->TMPL->expectAtLeastOnce('fetch_param', array('action'));
        $this->assertIdentical($expected, $this->_params->getAction());
    }
    public function testGetActionReturnsTemplateParam(){
        $expected = "recommend";
        $this->EE->TMPL->returns('fetch_param', $expected, array('action'));
        $this->EE->TMPL->expectAtLeastOnce('fetch_param', array('action'));
        $this->assertIdentical($expected, $this->_params->getAction());
    }
    public function testGetFontReturnsLucidaByDefault(){
        $expected = "lucida grande";
        $this->EE->TMPL->returns('fetch_param', '', array('font'));
        $this->EE->TMPL->expectAtLeastOnce('fetch_param', array('font'));
        $this->assertIdentical($expected, $this->_params->getFont());
    }
    public function testGetFontReturnsTemplateParam(){
        $expected = "verdana";
        $this->EE->TMPL->returns('fetch_param', $expected, array('font'));
        $this->EE->TMPL->expectAtLeastOnce('fetch_param', array('font'));
        $this->assertIdentical($expected, $this->_params->getFont());
    }
    public function testGetColorReturnsLightByDefault(){
        $expected = "light";
        $this->EE->TMPL->returns('fetch_param', '', array('color'));
        $this->EE->TMPL->expectAtLeastOnce('fetch_param', array('color'));
        $this->assertIdentical($expected, $this->_params->getColor());
    }
    public function testGetColorReturnsTemplateParam(){
        $expected = "dark";
        $this->EE->TMPL->returns('fetch_param', $expected, array('color'));
        $this->EE->TMPL->expectAtLeastOnce('fetch_param', array('color'));
        $this->assertIdentical($expected, $this->_params->getColor());
    }
    public function testGetRefRetunsNullByDefault(){
        $expected = "";
        $this->EE->TMPL->returns('fetch_param', '', array('ref'));
        $this->EE->TMPL->expectOnce('fetch_param', array('ref'));
        $this->assertIdentical($expected, $this->_params->getRef());
    }
    public function testGetRefReturnsTemplateParam(){
        $expected = "the-ref";
        $this->EE->TMPL->returns('fetch_param', $expected, array('ref'));
        $this->EE->TMPL->expectOnce('fetch_param', array('ref'));
        $this->assertIdentical($expected, $this->_params->getRef());
    }
    public function testGetCssClassReturnsEmptyStringByDefault(){
        $expected = "";
        $this->EE->TMPL->returns('fetch_param', '', array('class'));
        $this->EE->TMPL->expectOnce('fetch_param', array('class'));
        $this->assertIdentical($expected, $this->_params->getCssClass());
    }
    public function testGetCssClassReturnsTemplateParam(){
        $expected = "socialeesta-test";
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
        $expected = "socialeesta-id";
        $this->EE->TMPL->returns('fetch_param', $expected, array('id'));
        $this->EE->TMPL->expectOnce('fetch_param', array('id'));
        $this->assertIdentical($expected, $this->_params->getCssId());
        
    }
}
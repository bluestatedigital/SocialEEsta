<?php
require_once PATH_THIRD .'socialeesta/TemplateParams/TwitterFollow.php';
class TwitterFollowTemplateParams extends Testee_unit_test_case {
    private $_params;

    
    public function __construct(){
        parent::__construct('Twitter Follow Template Params class test');
    }
    public function setUp(){
        parent::setUp();
        $this->_params = new TemplateParams_TwitterFollow($this->EE->TMPL);
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
    public function testGetUser(){
        $this->EE->TMPL->returns('fetch_param', 'bsdwire', array('user'));
        $this->EE->TMPL->expectOnce('fetch_param', array('user'));
        $this->assertIdentical('bsdwire', $this->_params->getUser());
    }
    public function testGetFollowerCountReturnsFalseByDefault(){
        $this->EE->TMPL->returns('fetch_param', '', array('follower_count'));
        $this->EE->TMPL->expectOnce('fetch_param', array('follower_count'));
        $this->assertFalse($this->_params->getFollowerCount());
    }
    public function testGetFollowerCountReturnsTemplateParam(){
        $this->EE->TMPL->returns('fetch_param', 'yes', array('follower_count'));
        $this->EE->TMPL->expectOnce('fetch_param', array('follower_count'));
        $this->assertTrue($this->_params->getFollowerCount());
        }
    public function testGetShowScreenNameReturnsTrueByDefault(){
        $this->EE->TMPL->returns('fetch_param', '', array('show_screen_name'));
        $this->EE->TMPL->expectOnce('fetch_param', array('show_screen_name'));
        $this->assertTrue($this->_params->getShowScreenName());
    }
    public function testGetShowScreenNameReturnsTemplateParam(){
        $this->EE->TMPL->returns('fetch_param', 'no', array('show_screen_name'));
        $this->EE->TMPL->expectOnce('fetch_param', array('show_screen_name'));
        $this->assertFalse($this->_params->getShowScreenName());
    }
    
    public function testGetWidthReturnsEmptyStringByDefault(){
        $this->EE->TMPL->returns('fetch_param', '', array('width'));
        $this->EE->TMPL->expectAtLeastOnce('fetch_param');
        $this->assertIdentical("", $this->_params->getWidth());
    }
    public function testGetWidthReturnsTemplateParam(){
        $expected = "200px";
        $this->EE->TMPL->returns('fetch_param', $expected, array('width'));
        $this->EE->TMPL->expectAtLeastOnce('fetch_param');
        $this->assertIdentical($expected, $this->_params->getWidth());
    }
    public function testGetAlignReturnsEmptyStringByDefault(){
        $expected = "";
        $this->EE->TMPL->returns('fetch_param', $expected, array('align'));
        $this->EE->TMPL->expectOnce('fetch_param');
        $this->assertIdentical($expected, $this->_params->getAlign());
    }
    public function testGetAlignReturnsTemplateParam(){
        $expected = "right";
        $this->EE->TMPL->returns('fetch_param', $expected, array('align'));
        $this->EE->TMPL->expectOnce('fetch_param');
        $this->assertIdentical($expected, $this->_params->getAlign());
    }
    public function testGetCssClassReturnsEmptyStringByDefault(){
        $expected = "";
        $this->EE->TMPL->returns('fetch_param', $expected, array('class'));
        $this->EE->TMPL->expectOnce('fetch_param');
        $this->assertIdentical($expected, $this->_params->getCssClass());
    }
    public function testGetCssClassReturnsTemplateParam(){
        $expected = "socialeesta-class";
        $this->EE->TMPL->returns('fetch_param', $expected, array('class'));
        $this->EE->TMPL->expectOnce('fetch_param');
        $this->assertIdentical($expected, $this->_params->getCssClass());
    }
    public function testGetCssIdReturnsEmptyStringByDefault(){
        $expected = "";
        $this->EE->TMPL->returns('fetch_param', $expected, array('id'));
        $this->EE->TMPL->expectOnce('fetch_param');
        $this->assertIdentical($expected, $this->_params->getCssId());
    }
    public function testGetCssIdReturnsTemplateParam(){
        $expected = "socialeesta-id";
        $this->EE->TMPL->returns('fetch_param', $expected, array('id'));
        $this->EE->TMPL->expectOnce('fetch_param');
        $this->assertIdentical($expected, $this->_params->getCssId());
    }
    public function testGetLangReturnsEnByDefault(){
        $expected = "en";
        $this->EE->TMPL->returns('fetch_param', '', array('language'));
        $this->EE->TMPL->expectAtLeastOnce('fetch_param');
        $this->assertIdentical($expected, $this->_params->getLang());
        
    }
    public function testGetLangReturnsTemplateParam(){
        $expected = "fr";
        $this->EE->TMPL->returns('fetch_param', $expected, array('language'));
        $this->EE->TMPL->expectAtLeastOnce('fetch_param');
        $this->assertIdentical($expected, $this->_params->getLang());
    }
    public function testGetSizeReturnsMediumByDefault(){
        $expected = "medium";
        $this->EE->TMPL->returns('fetch_param', '', array('size'));
        $this->EE->TMPL->expectAtLeastOnce('fetch_param');
        $this->assertIdentical($expected, $this->_params->getSize());
    }
    public function testGetSizeReturnsTemplateParam(){
        $expected = "large";
        $this->EE->TMPL->returns('fetch_param', $expected, array('size'));
        $this->EE->TMPL->expectAtLeastOnce('fetch_param');
        $this->assertIdentical($expected, $this->_params->getSize());
        
    }
}
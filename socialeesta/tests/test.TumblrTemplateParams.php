<?php
require_once PATH_THIRD .'socialeesta/TemplateParams/TumblrShare.php';
class TestTumblrShareTemplateParams extends Testee_unit_test_case {
    private $_params;

    
    public function __construct(){
        parent::__construct('Twitter Tweet Template Params class test');
    }
    public function setUp(){
        parent::setUp();
        $this->_params = new TumblrShareTemplateParams($this->EE->TMPL);
    }
    public function tearDown(){
        unset($this->_params);
    }
    public function testAppearanceReturnsMediumByDefault(){
        $expected = 'medium';
        $this->EE->TMPL->returns('fetch_param', '', array('appearance'));
        $this->assertIdentical($expected, $this->_params->getAppearance());
    }
    public function testGetAppearanceReturnsTemplateParam(){
        $expected = 'chicklet';
        $this->EE->TMPL->returns('fetch_param', 'chicklet', array('appearance'));
        $this->assertIdentical($expected, $this->_params->getAppearance());
    }
    public function testGetContentTypeReturnsLinkByDefault(){
        $expected = 'link';
        $this->EE->TMPL->returns('fetch_param', '', array('content_type'));
        $this->assertIdentical($expected, $this->_params->getContentType());
    }
    public function testGetContentTypeReturnsTemplateParam(){
        $expected = 'video';
        $this->EE->TMPL->returns('fetch_param', 'video', array('appearance'));
        $this->assertIdentical($expected, $this->_params->getAppearance());
    }
    public function testGetUrlReturnsEmptyStringByDefault(){
        $expected = '';
        $this->EE->TMPL->returns('fetch_param', '', array('url'));
        $this->assertIdentical($expected, $this->_params->getUrl());
    }
    public function testGetUrlReturnsTemplateParam(){
        $expected = 'http://www.bluestatedigital.com';
        $this->EE->TMPL->returns('fetch_param', 'http://www.bluestatedigital.com', array('url'));
        $this->assertIdentical($expected, $this->_params->getUrl());
    }
    public function testGetNameReturnsEmptyStringByDefault(){
        $expected = '';
        $this->EE->TMPL->returns('fetch_param', '', array('name'));
        $this->assertIdentical($expected, $this->_params->getName());
    }
    public function testGetNameReturnsTemplateParam(){
        $expected = 'Blue State Digital';
        $this->EE->TMPL->returns('fetch_param', $expected, array('name'));
        $this->assertIdentical($expected, $this->_params->getName());
    }
    
    public function testGetDescriptionReturnsEmptyStringByDefault(){
        $expected = '';
        $this->EE->TMPL->returns('fetch_param', '', array('description'));
        $this->assertIdentical($expected, $this->_params->getDescription());
    }
    public function testGetDescriptionReturnsTemplateParam(){
        $expected = 'Socialeesta share on Tumblr';
        $this->EE->TMPL->returns('fetch_param', $expected, array('description'));
        $this->assertIdentical($expected, $this->_params->getDescription());
    }
    public function testGetQuoteReturnsEmptyStringByDefault(){
        $expected = '';
        $this->EE->TMPL->returns('fetch_param', '', array('quote'));
        $this->assertIdentical($expected, $this->_params->getQuote());
    }
    public function testGetQuoteReturnsTemplateParam(){
        $expected = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
        $this->EE->TMPL->returns('fetch_param', $expected, array('quote'));
        $this->assertIdentical($expected, $this->_params->getQuote());
    }
    public function testGetSourceReturnsEmptyStringByDefault(){
        $expected = '';
        $this->EE->TMPL->returns('fetch_param', '', array('source'));
        $this->assertIdentical($expected, $this->_params->getSource());
    }
    public function testGetSourceReturnsTemplateParam(){
        $expected = 'Blue State Digital';
        $this->EE->TMPL->returns('fetch_param', $expected, array('source'));
        $this->assertIdentical($expected, $this->_params->getSource());
    }
    public function testGetCaptionReturnsEmptyStringByDefault(){
        $expected = '';
        $this->EE->TMPL->returns('fetch_param', '', array('caption'));
        $this->assertIdentical($expected, $this->_params->getCaption());
    }
    public function testGetCaptionReturnsTemplateParam(){
        $expected = 'Socialeesta Caption';
        $this->EE->TMPL->returns('fetch_param', $expected, array('caption'));
        $this->assertIdentical($expected, $this->_params->getCaption());
    }
    public function testGetClickthruReturnsEmptyStringByDefault(){
        $expected = '';
        $this->EE->TMPL->returns('fetch_param', '', array('clickthru'));
        $this->assertIdentical($expected, $this->_params->getClickthru());
    }
    public function testGetClickthruReturnsTemplateParam(){
        $expected = 'http://www.bluestatedigital.com/path/to/photo.jpg';
        $this->EE->TMPL->returns('fetch_param', $expected, array('clickthru'));
        $this->assertIdentical($expected, $this->_params->getClickthru());
    }
    public function testGetVideoEmbedCodeReturnsEmptyStringByDefault(){
        $expected = '';
        $this->EE->TMPL->returns('fetch_param', '', array('embed'));
        $this->assertIdentical($expected, $this->_params->getEmbed());
    }
    public function testGetVideoEmbedCodeReturnsTemplateParam(){
        $expected = '<iframe width="420" height="315" src="http://www.youtube.com/embed/pj-T_LxSCng" frameborder="0" allowfullscreen></iframe>';
        $this->EE->TMPL->returns('fetch_param', $expected, array('embed'));
        $this->assertIdentical($expected, $this->_params->getEmbed());
    }
    
}
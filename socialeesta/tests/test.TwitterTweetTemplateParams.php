<?php
require_once PATH_THIRD .'socialeesta/TemplateParams/TwitterTweet.php';
class TwitterTweetTemplateParams extends Testee_unit_test_case {
    private $_params;

    
    public function __construct(){
        parent::__construct('Twitter Tweet Template Params class test');
    }
    public function setUp(){
        parent::setUp();
        $this->_params = new TemplateParams_TwitterTweet($this->EE->TMPL);
    }
    public function tearDown(){
        unset($this->_params);
    }
    public function testGetTweetButtonTypeWithTagParam(){
        $this->EE->TMPL->returns('fetch_param', 'iframe', array('type'));
        $this->assertIdentical('iframe', $this->_params->getType());
    }
    public function testTweetButtonTypeIsHtml5ByDefault(){
        $this->EE->TMPL->returns('fetch_param', '', array('type'));
        $this->assertIdentical('html5', $this->_params->getType());
    }
    
    public function testGetUrl(){
        $this->EE->TMPL->returns('fetch_param', 'http://www.bluestatedigital.com', array('url') );
        $this->assertIdentical('http://www.bluestatedigital.com', $this->_params->getUrl());
    }
    public function testGetUrlReturnsEmptyStringByDefault(){
        $this->EE->TMPL->returns('fetch_param', '', array('url'));
        $this->assertIdentical('', $this->_params->getUrl());
    }
    public function testGetCountUrl(){
        $this->EE->TMPL->returns('fetch_param', 'http://www.bluestatedigital.com/count_url', array('count_url'));
        $this->assertIdentical('http://www.bluestatedigital.com/count_url', $this->_params->getCountUrl());
    }
    public function testGetCountUrlReturnsEmptyStringByDefault(){
        $this->EE->TMPL->returns('fetch_param', '', array('count_url'));
        $this->assertIdentical('', $this->_params->getCountUrl());
    }
    public function testGetVia(){
        $this->EE->TMPL->returns('fetch_param', 'bsdwire', array('via'));
        $this->assertIdentical('bsdwire', $this->_params->getVia());
    }
    public function testGetViaReturnsEmptyStringByDefault(){
        $this->EE->TMPL->returns('fetch_param', '', array('via'));
        $this->assertIdentical('', $this->_params->getVia());
    }
    public function testGetText(){
        $this->EE->TMPL->returns('fetch_param', 'SocialEEsta Unit Tests', array('text'));
        $this->assertIdentical('SocialEEsta Unit Tests', $this->_params->getText());
    }
    public function testGetTextReturnsEmptyStringByDefault(){
        $this->EE->TMPL->returns('fetch_param', '', array('text'));
        $this->assertIdentical('', $this->_params->getText());
    }
    public function testGetCountPosition(){
        $this->EE->TMPL->returns('fetch_param', 'vertical', array('count_position'));
        $this->assertIdentical('vertical', $this->_params->getCountPosition());
    }
    public function testGetCountPositionReturnsHorizontalByDefault(){
        $this->EE->TMPL->returns('fetch_param', '', array('count_position'));
        $this->assertIdentical('horizontal', $this->_params->getCountPosition());
    }
    public function testGetRelated(){
        $this->EE->TMPL->returns('fetch_param', 'bsdtools', array('related'));
        $this->assertIdentical('bsdtools', $this->_params->getRelatedAccts());
    }
    public function testGetRelatedReturnsEmptyStringByDefault(){
        $this->EE->TMPL->returns('fetch_param', '', array('related'));
        $this->assertIdentical('', $this->_params->getRelatedAccts());
        
    }
    public function testGetId(){
        $this->EE->TMPL->returns('fetch_param', 'id', array('id'));
        $this->assertIdentical('id', $this->_params->getCssId());
        
    }
    public function testGetIdReturnsEmptyStringByDefault(){
        $this->EE->TMPL->returns('fetch_param', '', array('id'));
        $this->assertIdentical('', $this->_params->getCssId());
    }
    public function testGetClass(){
        $this->EE->TMPL->returns('fetch_param', 'class', array('class'));
        $this->assertIdentical('class', $this->_params->getCssClass());
    }
    public function testGetClassReturnsEmptyStringByDefault(){
        $this->EE->TMPL->returns('fetch_param', '', array('class'));
        $this->assertIdentical('', $this->_params->getCssClass());
        
    }
    public function testGetLinkText(){
        $this->EE->TMPL->returns('fetch_param', 'Tweet This', array('link_text'));
        $this->assertIdentical('Tweet This', $this->_params->getLinkText());
        
    }
    public function testGetLinkTextReturnsTweetByDefault(){
        $this->EE->TMPL->returns('fetch_param', '', array('link_text'));
        $this->assertIdentical('Tweet', $this->_params->getLinkText());
    }
    public function testGetLanguage(){
        $this->EE->TMPL->returns('fetch_param', 'fr', array('language'));
        $this->assertIdentical('fr', $this->_params->getLang());
        
    }
    public function testGetLanguageReturnsEnByDefault(){
        $this->EE->TMPL->returns('fetch_param', '', array('language'));
        $this->assertIdentical('en', $this->_params->getLang());

    }
    public function testGetButtonSize(){
        $this->EE->TMPL->returns('fetch_param', 'large', array('size'));
        $this->assertIdentical('large', $this->_params->getSize());
        
    }
    public function testGetButtonSizeReturnsMediumByDefault(){
        $this->EE->TMPL->returns('fetch_param', '', array('size'));
        $this->assertIdentical('medium', $this->_params->getSize());

    }
   
}
<?php
require_once PATH_THIRD .'socialeesta/Utils/DataAttrs.php';
require_once PATH_THIRD .'socialeesta/GoogleButtons/GooglePlusOne_HTML5.php';
require_once PATH_THIRD .'socialeesta/TemplateParams/GooglePlusOne.php';
Mock::generate('DataAttrs');
Mock::generate('TemplateParams_GooglePlusOne');

class GooglePlusOne extends Testee_unit_test_case {
    private $_button;
    private $_dataAttrs;
    private $_params;
    
    public function __construct(){
        parent::__construct('+1 Button HTML5 class test');
    }
    public function setUp(){
        $this->_dataAttrs = new MockDataAttrs();
        $this->_params = new MockTemplateParams_GooglePlusOne($this->EE->TMPL);
        $this->_dataAttrs->returns('getAttrs', 'data-href="http://dback.bsdproduction.com/ee_test/" data-annotation="bubble" data-size="medium"');

    }
    public function tearDown(){
       unset($this->_button);
       unset($this->_dataAttrs);
    }
    public function testButtonReturnsDefaultClass(){
        $expected = 'g-plusone';
        $this->_button = new GooglePlusOne_HTML5($this->_dataAttrs);
        $this->assertIdentical($expected, $this->_button->getClass());
    }
    public function testButtonReturnsTemplateParamClass(){
        $expected = 'g-plusone socialeesta-test';
        $this->_button = new GooglePlusOne_HTML5($this->_dataAttrs, NULL, array("class" => "socialeesta-test"));
        $this->assertIdentical($expected, $this->_button->getClass());
    }
    public function testButtonHasNoIdByDefault(){
        $this->_button = new GooglePlusOne_HTML5($this->_dataAttrs);
        $this->assertNull($this->_button->getId());
    }
    public function testButtonReturnsTemplateParamId(){
        $expected = 'socialeesta-id';
        $this->_button = new GooglePlusOne_HTML5($this->_dataAttrs, NULL, array("id" => "socialeesta-id"));
        $this->assertIdentical($expected, $this->_button->getId());
    }
    public function testButtonMarkupIsCorrect(){
        $expected = '<div class="g-plusone" data-href="http://dback.bsdproduction.com/ee_test/" data-annotation="bubble" data-size="medium"></div>';
        $this->_button = new GooglePlusOne_HTML5($this->_dataAttrs);
        $this->assertIdentical($expected, $this->_button->getHtml());
    }
    public function testShareButtonMarkupIsCorrect(){
        $expected = '<div class="g-plus" data-action="share"></div>';
        $attrs = new MockDataAttrs();
        $this->EE->TMPL->returns('fetch_param', 'share', array('action'));
        $attrs->returns('getAttrs', 'data-action="share"');
        $attrs->returns('fetchAttr', 'share', array('action'));
        $this->_button= new GooglePlusOne_HTML5($attrs);
        $this->assertIdentical($expected, $this->_button->getHtml());
    }
}

//<div class="g-plusone" data-href="http://dback.bsdproduction.com/ee_test/" data-annotation="bubble" data-size="medium"></div>
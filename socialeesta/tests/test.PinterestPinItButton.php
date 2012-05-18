<?php
require_once PATH_THIRD .'socialeesta/Utils/QueryString.php';
require_once PATH_THIRD .'socialeesta/PinterestButtons/PinterestPinIt.php';
Mock::generate('QueryString');

class PinterestPinItButtonTest extends Testee_unit_test_case {
    private $_button;
    private $_queryString;
    
    
    public function __construct(){
        parent::__construct('PinterestPinIt Button class test');
    }
    public function setUp(){
        $this->_queryString = new MockQueryString();
        $this->_queryString->returns('getQueryString', '?url=http%3A%2F%2Fwww.bluestatedigital.com&media=http%3A%2F%2Fbsdaction.3cdn.net%2Ff38bf8194396b5afef_icm6i6pf0.jpg&description=Description%20of%20the%20thing');

        
    }
    public function tearDown(){
        unset($this->_button);
        unset($this->_queryString);
    }
    
    public function testButtonMarkupReturnsProperly(){
        $this->_button = new PinterestPinIt($this->_queryString, 'horizontal');
        $expected = '<a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fwww.bluestatedigital.com&media=http%3A%2F%2Fbsdaction.3cdn.net%2Ff38bf8194396b5afef_icm6i6pf0.jpg&description=Description%20of%20the%20thing" class="pin-it-button" count-layout="horizontal"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>';
        $this->assertIdentical($expected, $this->_button->getButton());
    }

}
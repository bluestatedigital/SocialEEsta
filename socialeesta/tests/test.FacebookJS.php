<?php
require_once PATH_THIRD .'socialeesta/Script/FacebookJS.php';

class TestFacebookJs extends Testee_unit_test_case {
    private $_script;

    
    public function __construct(){
        parent::__construct('Facebook Javascript class test');
    }
    public function setUp(){
        parent::setUp();

    }
    public function tearDown(){
        unset($this->_script);
    }
    public function testScriptReturnsAppId(){
        $expected = '123456789012345';
        $this->_script = new FacebookJS($expected);
        $this->assertIdentical($expected, $this->_script->getAppId());
    }
    public function testScriptReturnsChannelUrl(){
        $expected = "http://www.bluestatedigital.com/path/to/channel.html";
        $this->_script = new FacebookJS('', $expected);
        $this->assertIdentical($expected, $this->_script->getChannelUrl());
    }
    public function testScriptReturnsAsyncScript(){
        $expected = "<script>\n"
                . "(function(d){\n"
                . "var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}\n"
                . "js = d.createElement('script'); js.id = id; js.async = true;\n"
                . "js.src = '//connect.facebook.net/en_US/all.js'\n;"
                . " d.getElementsByTagName('head')[0].appendChild(js);\n"
                . " }(document));\n"
                . "</script>";
        $this->_script = new FacebookJS();
        $this->assertIdentical($expected, $this->_script->asyncScript());
    }
    public function testScriptReturnsInit(){
        $expected = "<div id='fb-root'></div>\n"
                    ."<script>\n"
                    ."window.fbAsyncInit = function() {\n"
                    ."FB.init(\n"
                    .'{"status":true,"cookie":true,"oauth":true,"xfbml":true,"appid":"123456789012345"}'
                    ."\n);};\n</script>";
        $this->_script = new FacebookJS("123456789012345");
        $this->assertIdentical($expected, $this->_script->getFbInit());
    }
    
}
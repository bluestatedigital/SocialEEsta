<?php 

class FacebookJS {

    private $_initOptions = array(
        "status" => true,
        "cookie" => true,
        "oauth" => true,
        "xfbml" => true,
        "appid" => NULL
    );

    public function __construct($appId = '', $channelUrl = NULL){
        $this->_initOptions["appid"] = $appId;
        if (!is_null($channelUrl)) $this->_initOptions["channelURL"] = $channelUrl;
    }

    public function getAppId(){
        return $this->_initOptions["appid"];
    }
    public function getChannelUrl(){
        return $this->_initOptions["channelURL"];
    }
    public function asyncScript(){
        return "<script>\n"
                . "(function(d){\n"
                . "var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}\n"
                . "js = d.createElement('script'); js.id = id; js.async = true;\n"
                . "js.src = '//connect.facebook.net/en_US/all.js'\n;"
                . " d.getElementsByTagName('head')[0].appendChild(js);\n"
                . " }(document));\n"
                . "</script>";
    }
    public function getFbInit(){

        return "<div id='fb-root'></div>\n"
        ."<script>\n"
        ."window.fbAsyncInit = function() {\n"
        ."FB.init(\n"
        . json_encode((object) $this->_initOptions) 
        . "\n);};</script>";
    }
}
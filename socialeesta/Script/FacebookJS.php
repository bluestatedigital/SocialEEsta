<?php 

class FacebookJS {

    private $_initOptions = array(
        "status" => true,
        "cookie" => true,
        "oauth" => true,
        "xfbml" => true
    );
    private $_autoGrow;

    public function setAppId($appId){
        if (!is_null($appId)){
            $this->_initOptions["appid"] = $appId;
        }
    }
    public function setAutoGrow($val){
        if ($val === "true"){
            $this->_autoGrow = TRUE;
        } else if ( is_numeric($val) ){
            $this->_autoGrow = $val;
        } else {
            $this->_autoGrow = FALSE;
        }
    }
    private function getAutoGrow(){
        if (is_bool($this->_autoGrow)){
            return $this->_autoGrow ? "FB.Canvas.setAutoGrow();" : "";
        } else {
            return "FB.Canvas.setAutoGrow(" . $this->_autoGrow . ");";
        }
    }
    public function setChannelUrl($channelUrl = ''){
        if (!empty($channelUrl)){
            $this->_initOptions["channelURL"] = $channelUrl;
        }
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
        ." window.fbAsyncInit = function() {\n"
        ."FB.init(\n"
        . stripslashes(json_encode((object) $this->_initOptions)) 
        . "\n);\n" . $this->getAutoGrow() . "\n};</script>";
    }
}
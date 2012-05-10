<?php 

class FacebookJS {

    private $_initOptions = array(
        "status" => true,
        "cookie" => true,
        "oauth" => true,
        "xfbml" => true,
        "appid" => NULL
    );
    private $_autoGrow;

    public function __construct($appId = '', $channelUrl = NULL, $autoGrow = NULL){
        $this->_initOptions["appid"] = $appId;
        if (!empty($channelUrl)) $this->_initOptions["channelURL"] = $channelUrl;
        if (!is_null($autoGrow)) $this->setAutoGrow($autoGrow);
    }

    public function getAppId(){
        return $this->_initOptions["appid"];
    }
    public function getChannelUrl(){
        return $this->_initOptions["channelURL"];
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
            return $this->_autoGrow ? "\nFB.Canvas.setAutoGrow();\n" : "";
        } else if (is_numeric($this->_autoGrow)){
            return "\nFB.Canvas.setAutoGrow(" . $this->_autoGrow . ");\n";
        } else {
            return "";
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
        ."window.fbAsyncInit = function() {\n"
        ."FB.init(\n"
        . stripslashes(json_encode((object) $this->_initOptions))
        . "\n);" . $this->getAutoGrow() . "};\n</script>";
    }
}
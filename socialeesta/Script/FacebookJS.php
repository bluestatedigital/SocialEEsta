<?php 

class FacebookJS {
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
    public function fbInit($appId, $channelUrl){
        return "FB.init({\n"
          . "appId      : " . $app_id 
          . "channelURL : " . $channelUrl
          . "status     : true,"
          . "cookie     : true,"
          . "oauth      : true,"
          . "xfbml      : true"
          . "});";
    }
}
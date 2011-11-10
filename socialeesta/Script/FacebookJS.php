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
        $initOptions = array(
            "appID" => $appId,
            "status" => true,
            "cookie" => true,
            "oauth" => true,
            "xfbml" => true
        );
        if (!is_null($channelUrl)){
            $initOptions["channelURL"] = $channelUrl;
        }
        return "<div id='fb-root'></div>\n"
        ."<script>\n"
        ." window.fbAsyncInit = function() {\n"
        ."FB.init(\n"
        . json_encode((object) $initOptions) 
        . "\n);};</script>";
    }
}
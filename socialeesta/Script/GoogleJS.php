<?php 

class GoogleJS {
    
    public function asyncScript(){
        return "<script type='text/javascript'>\n"
                . "(function() {\n"
                . "var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;\n"
                . "po.src = 'https://apis.google.com/js/plusone.js';\n"
                . "var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);\n"
                . "})();\n"
                . "</script>";
    }
}
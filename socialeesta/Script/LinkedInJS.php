<?php 

class LinkedInJS {
    const LINKED_IN_JS = "//platform.linkedin.com/in.js";

    public function asyncScript(){
        return "<script>(function(d){var li = document.createElement(\"script\");\n"
                . "li.src = \"" . self::LINKED_IN_JS . "\";\n"
                . "li.async = \"true\";\n"
                . "d.getElementsByTagName(\"script\")[0].appendChild(li);\n"
                . "}(document));\n"
                . "</script>";
    }
    public function getJsUrl(){
        return self::LINKED_IN_JS;
    }
    

}
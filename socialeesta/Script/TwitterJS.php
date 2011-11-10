<?php 

class TwitterJS {
    const URL = '//platform.twitter.com/widgets.js';

    public function asyncScript() {
        return "<script>\n"
            . "(function(){\n"
            . "var twsc = document.createElement('script');\n"
            . "twsc.type = 'text/javascript';\n"
            . "twsc.src = '"  . self::URL . "';\n"
            . "document.body.appendChild(twsc);\n"
            . "})();\n"
            . "</script>\n";
    }
}
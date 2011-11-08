<?php 

class TwitterWidget {
    const URL = 'http://platform.twitter.com/widgets.js';

    public function getHtml() {
        return "<script>\n"
            . "(function(){\n"
            . "if ( !window.twttr ){\n"
            . "var twsc = document.createElement('script');\n"
            . "twsc.type = 'text/javascript';\n"
            . "twsc.src = '"  . self::URL . "';\n"
            . "document.body.appendChild(twsc);\n"
            . "}})();\n"
            . "</script>\n";
    }
}
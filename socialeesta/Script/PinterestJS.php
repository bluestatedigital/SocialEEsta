<?php 

class PinterestJS {
    const URL = '//assets.pinterest.com/js/pinit.js';

    public function asyncScript() {
        return "<script>\n"
            . "(function(){\n"
            . "var p = document.createElement('script');\n"
            . "p.type = 'text/javascript';\n"
            . "p.src = '"  . self::URL . "';\n"
            . "document.body.appendChild(p);\n"
            . "})();\n"
            . "</script>\n";
    }
}
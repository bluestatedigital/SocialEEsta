<?php

class QueryString {
    private $_params = array();

    public function addParam($name, $value) {
        if ($value) {
            $this->_params[$name] = $value;
        }
    }

    public function getQueryString() {
        return http_build_query($this->_params);
    }
}
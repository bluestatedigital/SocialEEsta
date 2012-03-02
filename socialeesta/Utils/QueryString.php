<?php

class QueryString {
    private $_params = array();

    public function addParam($name, $value) {
        if ($value) {
            $this->_params[$name] = $value;
        }
    }
    public function getValue($key){
        return $this->_params[$key];
    }
    public function getQueryString() {
        return "?" . str_replace("+", "%20", http_build_query($this->_params));
    }
}
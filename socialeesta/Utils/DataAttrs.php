<?php

class DataAttrs {
    private $_params = array();
    
    private function implode_with_keys( $separator, $array ) {
        if ( ! is_array( $array ) ) return $array;
        $string = array();
        foreach ( $array as $key => $val ) {
            if ( is_array( $val ) )
                $val = implode( ',', $val );
            $string[] = "{$key}=\"{$val}\"";
        }
        return implode( $separator, $string );
    }
    
    public function addAttr($name, $value) {
        if ($value) {
            $this->_params["data-" . $name] = $value;
        }
    }
    public function fetchAttr($name){
        return $this->_params["data-" . $name];
    }
    public function getAttrs() {
        return $this->implode_with_keys(" ", $this->_params);
    }
    

}
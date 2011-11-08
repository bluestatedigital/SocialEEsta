<?php 

class Tweet_JS {
    const SHARE_URL = "http://twitter.com/share";

    private $_widget;
    private $_queryString;
    private $_id;
    private $_class;
    private $_includeJs = TRUE;

    public function __construct(TwitterWidgetsJS $widget, QueryString $queryString) {
        $this->_widget = $widget;
        $this->_queryString = $queryString;
    }

    public function setId($id) {
        if (!is_null($id)) {
            $this->_id = $id;
        }
    }

    public function setClass($class) {
        if (!is_null($class)) {
            $this->_class = $class;
        }
    }

    public function setIncludeJs($include) {
        $this->_includeJs = (bool) $include;
    }

    public function getHtml($linkText) {
        $html = '';

        if ($this->_includeJs) {
            $html .= $this->_widget->getHtml();
        }

        $html .= '<a href="' . self::SHARE_URL . '?' . $this->_queryString->getQueryString() . '"';

        if (isset($this->_id)) {
            $html .= ' id="' . $this->_id . '"';
        }

        if (isset($this->_class)) {
            $html .= ' class="' . $this->_class . '"';
        }

        $html .= ">$linkText</a>";

        return $html;
    }
}
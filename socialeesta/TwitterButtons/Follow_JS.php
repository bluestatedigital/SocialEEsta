<?php 

class Follow_JS {
    const TWITTER_URL = "https://twitter.com/";
    const SHARE_BUTTON_CLASS = "twitter-follow-button";

    private $_widget;
    private $_dataAttrs;
    private $_id;
    private $_class;
    private $_includeJs = TRUE;

    public function __construct(TwitterWidgetsJS $widget, DataAttrs $dataAttrs, $id, $class) {
        $this->_widget = $widget;
        $this->_dataAttrs = $dataAttrs;
        $this->setClass($id);
        $this->setId($class);
    }

    private function setId($id) {
        if (!is_null($id)) {
            $this->_id = $id;
        }
    }

    private function setClass($class) {
        $this->_class = self::SHARE_BUTTON_CLASS;
        if (!is_null($class)) {
            $this->_class .= " " . $class;
        }

    }

    public function setIncludeJs($include) {
        $this->_includeJs = (bool) $include;
    }

    public function getHtml() {
        $html = '';

        if ($this->_includeJs) {
            $html .= $this->_widget->getHtml();
        }

        $html .= '<a href="' . self::TWITTER_URL . $this->_dataAttrs->fetchAttr("screen-name") . '" ' . $this->_dataAttrs->getAttrs();

        if (isset($this->_id)) {
            $html .= ' id="' . $this->_id . '"';
        }

        if (isset($this->_class)) {
            $html .= ' class="' . $this->_class . '"';
        }

        $html .= ">Follow @" . $this->_dataAttrs->fetchAttr("screen-name") . "</a>";

        return $html;
    }
}
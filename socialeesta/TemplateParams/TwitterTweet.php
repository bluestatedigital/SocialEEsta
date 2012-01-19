<?php 

class TemplateParams_TwitterTweet {
    
    private $_eeTemplate;

    public function __construct(EE_Template $eeTemplate) {
        $this->_eeTemplate = $eeTemplate;
    }
    function getType() {
        return $this->_eeTemplate->fetch_param('type', 'html5');
    }
    function getUrl() {
        return $this->_eeTemplate->fetch_param('url');
    }
    function getCountUrl(){
        return $this->_eeTemplate->fetch_param('count_url', NULL);
    }
    function getVia(){
        return $this->_eeTemplate->fetch_param('via', NULL);
    }
    function getText(){
        return $this->_eeTemplate->fetch_param('text', NULL);
    }
    function getCountPosition(){
        return $this->_eeTemplate->fetch_param('count_position', 'horizontal');
    }
    function getRelatedAccts(){
        return $this->_eeTemplate->fetch_param('related', NULL);
    }
    function getCssClass(){
        return $this->_eeTemplate->fetch_param('class', NULL);
    }
    function getCssId(){
        return $this->_eeTemplate->fetch_param('id', NULL);
    }
    function getLinkText(){
        return $this->_eeTemplate->fetch_param('link_text', 'Tweet');
    }
    function getLang(){
        return $this->_eeTemplate->fetch_param('language', 'en');
    }
    function getSize(){
        return $this->_eeTemplate->fetch_param('size', 'medium');
    }
    public function getIncludeJS() {
        return $this->_eeTemplate->fetch_param('include_js', 'no') == 'yes';
    }
    
}
<?php 

class TemplateParams_TwitterTweet {
    
    private $_eeTemplate;

    public function __construct(EE_Template $eeTemplate) {
        $this->_eeTemplate = $eeTemplate;
    }
    function getType() {
        return $this->_eeTemplate->fetch_param('type') ? $this->_eeTemplate->fetch_param('type') : 'html5';
    }
    function getUrl() {
        return $this->_eeTemplate->fetch_param('url');
    }
    function getCountUrl(){
        return $this->_eeTemplate->fetch_param('count_url');
    }
    function getVia(){
        return $this->_eeTemplate->fetch_param('via');
    }
    function getText(){
        return $this->_eeTemplate->fetch_param('text');
    }
    function getCountPosition(){
        return $this->_eeTemplate->fetch_param('count_position') ? $this->_eeTemplate->fetch_param('count_position') : 'horizontal';
    }
    function getRelatedAccts(){
        return $this->_eeTemplate->fetch_param('related');
    }
    function getCssClass(){
        return $this->_eeTemplate->fetch_param('class');
    }
    function getCssId(){
        return $this->_eeTemplate->fetch_param('id');
    }
    function getLinkText(){
        return $this->_eeTemplate->fetch_param('link_text') ? $this->_eeTemplate->fetch_param('link_text') : 'Tweet';
    }
    function getLang(){
        return $this->_eeTemplate->fetch_param('language') ? $this->_eeTemplate->fetch_param('language') : 'en';
    }
    function getSize(){
        return $this->_eeTemplate->fetch_param('size') ? $this->_eeTemplate->fetch_param('size') :'medium';
    }
    public function getIncludeJS() {
        return $this->_eeTemplate->fetch_param('include_js', 'no') == 'yes';
    }
    
}
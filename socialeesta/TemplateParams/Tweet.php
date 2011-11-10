<?php 

class TemplateParams_Tweet {
    
    private $_eeTemplate;

    public function __construct(EE_Template $eeTemplate) {
        $this->_eeTemplate = $eeTemplate;
    }
    function getType() {
        return $this->_eeTemplate->fetch_param('type', 'js');
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
        return $this->_eeTemplate->fetch_param('count_position', NULL);
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
        return $this->_eeTemplate->fetch_param('link_text', 'Tweet');
    }
    function getLang(){
        return $this->_eeTemplate->fetch_param('language', 'en');
    }
    public function getIncludeJS() {
        return $this->_eeTemplate->fetch_param('include_js', 'no') == 'yes';
    }
    
}
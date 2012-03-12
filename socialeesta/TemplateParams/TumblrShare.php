<?php 

class TumblrShareTemplateParams {
    
    private $_eeTemplate;

    public function __construct(EE_Template $eeTemplate) {
        $this->_eeTemplate = $eeTemplate;
    }
   public function getAppearance(){
       return $this->_eeTemplate->fetch_param('appearance') ? $this->_eeTemplate->fetch_param('appearance') : 'medium';
   }
   public function getContentType(){
       return $this->_eeTemplate->fetch_param('content_type') ? $this->_eeTemplate->fetch_param('content_type') : 'link';
   }
   public function getUrl(){
       return $this->_eeTemplate->fetch_param('url');
   }
   public function getName(){
       return $this->_eeTemplate->fetch_param('name');
   }
   public function getDescription(){
       return $this->_eeTemplate->fetch_param('description');
   }
   public function getQuote(){
       return $this->_eeTemplate->fetch_param('quote');
   }
   public function getSource(){
       return $this->_eeTemplate->fetch_param('source');
   }
   public function getCaption(){
       return $this->_eeTemplate->fetch_param('caption');
   }
   public function getClickthru(){
       return $this->_eeTemplate->fetch_param('clickthru');
   }
   public function getEmbed(){
       return $this->_eeTemplate->fetch_param('embed');
   }
}
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ExpressionEngine - by EllisLab
 *
 * @package     ExpressionEngine
 * @author      ExpressionEngine Dev Team
 * @copyright   Copyright (c) 2003 - 2011, EllisLab, Inc.
 * @license     http://expressionengine.com/user_guide/license.html
 * @link        http://expressionengine.com
 * @since       Version 2.0
 * @filesource
 */
 
// ------------------------------------------------------------------------

/**
 * BSD SocialEEsta Plugin
 *
 * @package     ExpressionEngine
 * @subpackage  Addons
 * @category    Plugin
 * @author      Douglas Back
 * @link        http://www.bluestatedigital.com
 */

$plugin_info = array(
    'pi_name'       => 'SocialEEsta',
    'pi_version'    => '1.0b',
    'pi_author'     => 'Douglas Back',
    'pi_author_url' => 'http://www.bluestatedigital.com',
    'pi_description'=> 'Generate social sharing plugins for your EE pages.',
    'pi_usage'      => Socialeesta::usage()
);

require_once 'Utils/QueryString.php';
require_once 'Utils/DataAttrs.php';

class Socialeesta {
    public $return_data;
    const CLASS_NAME = 'Socialeesta_ext';
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->EE =& get_instance();
    }
    
    public function tweet()
    {
        require_once 'TemplateParams/Tweet.php';
        
        $params = new TemplateParams_Tweet($this->EE->TMPL);


        switch ($params->getType()) {
            case 'iframe':
                require_once 'TwitterButtons/Tweet_Iframe.php';
                $queryString = new QueryString();
                $queryString->addParam('url', $params->getUrl());
                $queryString->addParam('counturl', $params->getCountUrl());
                $queryString->addParam('via', $params->getVia());
                $queryString->addParam('text', $params->getText());
                $queryString->addParam('count', $params->getCountPosition());
                $queryString->addParam('related', $params->getRelatedAccts());
                $queryString->addParam('lang', $params->getLang());
                $iframe = new Tweet_Iframe($queryString);
                return $iframe->getHtml();
                
            case 'js':
            default:
                require_once 'TwitterButtons/Tweet_JS.php';
                require_once 'Script/TwitterJS.php';
                $dataAttrs = new DataAttrs();
                $dataAttrs->addAttr('url', $params->getUrl());
                $dataAttrs->addAttr('counturl', $params->getCountUrl());
                $dataAttrs->addAttr('via', $params->getVia());
                $dataAttrs->addAttr('text', $params->getText());
                $dataAttrs->addAttr('count', $params->getCountPosition());
                $dataAttrs->addAttr('related', $params->getRelatedAccts());
                $dataAttrs->addAttr('lang', $params->getLang());
                $button = new Tweet_JS(new TwitterJS(), $dataAttrs, $params->getCssId(), $params->getCssClass());
                $button->setId($params->getCssId());
                $button->setClass($params->getCssClass());
                $button->setIncludeJS($params->getIncludeJS());
                return $button->getHtml($params->getLinkText());                
        }
    }
    
    function follow(){
        require_once 'TemplateParams/Follow.php';

        $params = new TemplateParams_Follow($this->EE->TMPL);
        switch ($params->getType()) {
            case 'iframe':
                require_once 'TwitterButtons/Follow_Iframe.php';
                $queryString = new QueryString();
                $queryString->addParam('screen_name', $params->getUser());
                $queryString->addParam('show_count', $params->getFollowerCount());
                $queryString->addParam('button', $params->getButtonColor());
                $queryString->addParam('text_color', $params->getTextColor());
                $queryString->addParam('link_color', $params->getLinkColor());
                $queryString->addParam('lang', $params->getLang());
                $iframe = new FollowIframe($queryString, $params->getWidth());
                return $iframe->getHtml();
            case 'js':
            default:
                require_once 'TwitterButtons/Follow_JS.php';
                require_once 'Script/TwitterJS.php';
                $dataAttr = new DataAttrs();
                $dataAttr->addAttr('screen-name', $params->getUser());
                $dataAttr->addAttr('show-count', $params->getFollowerCount());
                $dataAttr->addAttr('button', $params->getButtonColor());
                $dataAttr->addAttr('text-color', $params->getTextColor());
                $dataAttr->addAttr('link-color', $params->getLinkColor());
                $dataAttr->addAttr('lang', $params->getLang());
                $dataAttr->addAttr('width', $params->getWidth());
                $dataAttr->addAttr('align', $params->getAlign());
                $button = new Follow_JS(new TwitterJS(), $dataAttr, $params->getCssId(), $params->getCssClass());
                $button->setId($params->getCssId());
                $button->setClass($params->getCssClass());
                $button->setIncludeJS($params->getIncludeJS());
                return $button->getHtml();
        }

    } // end function follow()
    
    function like(){ //Facebook Like Buttons
        require_once 'TemplateParams/FacebookLike.php';
        require_once 'Script/FacebookJS.php';
        $params = new TemplateParams_FacebookLike($this->EE->TMPL);
        
        switch($params->getType()){
            case "iframe":
                require_once 'FacebookButtons/FacebookLike_Iframe.php';
                $queryString = new QueryString();
                $queryString->addParam('href', $params->getHref());
                $queryString->addParam('send', $params->getSend());
                $queryString->addParam('layout', $params->getLayout());
                $queryString->addParam('show-faces', $params->getShowFaces());
                $queryString->addParam('width', $params->getWidth());
                $queryString->addParam('action', $params->getAction());
                $queryString->addParam('font', $params->getFont());
                $queryString->addParam('colorscheme', $params->getColor());
                $queryString->addParam('ref', $params->getRef());
                $iframe = new FacebookLike_Iframe($queryString);
                return $iframe->getHtml();
                break;
            case "html5":
            default:
                require_once 'FacebookButtons/FacebookLike_HTML5.php';
                $dataAttr = new DataAttrs();
                $dataAttr->addAttr('href', $params->getHref());
                $dataAttr->addAttr('send', $params->getSend());
                $dataAttr->addAttr('layout', $params->getLayout());
                $dataAttr->addAttr('show-faces', $params->getShowFaces());
                $dataAttr->addAttr('width', $params->getWidth());
                $dataAttr->addAttr('action', $params->getAction());
                $dataAttr->addAttr('font', $params->getFont());
                $dataAttr->addAttr('colorscheme', $params->getColor());
                $dataAttr->addAttr('ref', $params->getRef());
                
                $button = new FacebookLike_HTML5(new FacebookJS(), $dataAttr);
                $button->setClass($params->getCssClass());
                $button->setIncludeJS($params->getIncludeJS());
                return $button->getHtml();
        }
        
        
    }
    function plusone(){
        require_once 'GoogleButtons/GooglePlusOne_HTML5.php';
        require_once 'TemplateParams/GooglePlusOne.php';
        require_once 'Script/GoogleJS.php';
        $params = new TemplateParams_GooglePlusOne($this->EE->TMPL);
        $dataAttr = new DataAttrs();
        $dataAttr->addAttr('href', $params->getHref());
        $dataAttr->addAttr('annotation', $params->getAnnotation());
        $dataAttr->addAttr('size', $params->getSize());
        $dataAttr->addAttr('width', $params->getWidth());

        $button = new GooglePlusOne_HTML5(new GoogleJS(), $dataAttr);
        $button->setCallback($params->getJsCallback());
        $button->setClass($params->getCssClass());
        $button->setId($params->getCssId());
        return $button->getHtml();
    }
    function scripts(){
        require_once 'Script/FacebookJS.php';
        require_once 'Script/GoogleJS.php';
        require_once 'Script/TwitterJS.php';
        require_once 'Script/JSLibraries.php';
        require_once 'TemplateParams/Scripts.php';
        $params = new TemplateParams_Scripts($this->EE->TMPL);
        
        $scripts = new JSLibraries($params, new GoogleJS(), new TwitterJS(), new FacebookJS() );
        
        return $scripts->getScripts();
    }
    
    
    
    
    
    
    // ----------------------------------------------------------------
    
    /**
     * Plugin Usage
     */
    public static function usage()
    {
        ob_start();
?>
    This plugin has three uses:
    
    - Generate Twitter "Tweet" and button
    - Generate Twitter "Follow" and button 
    - Generate a Facebook "Like" button
    
    
    =============================
    = Twitter "Tweet" Button Parameters =
    =============================
    
    (based on Tweet Button specs). All Parameters are optional, but the Tweet Button won't function as expected without at least "url" or "text".
    
        - url  :  The URL to share on Twitter. The URL should be absolute.
        - type  :  "iframe", "js" :  Default value: "iframe"  :  The "js" version will also insert the Javascript. See "include_js".
        - count_url  :  The URL to which your shared URL resolves to; useful is the URL you are sharing has already been shortened. This affects the display of the Tweet count.
        - via  :  Screen name of the user to attribute the Tweet to.
        - text  :  Text of the suggested Tweet.
        - count_position  :  "none", "horizontal", or "vertical"  :  Default value: "none".
        - related  :  Related accounts.
        
        Type-specific Options:
        ************************
        Type "none" & "js":
        - class  :  Assign a class attribute to the element. 
        - id  :  Assigns an ID attribute to the  element. Only used when type="none".
        - link_text  :  If type="none", this will display as the text of the "Tweet" link. Defaults to "Tweet"
        
        Type "js":
        - include_js  :  "yes" or "no"  :  Default value: yes  :  If "yes", the Twitter widgets.js file will be loaded.


    Example tag:
    **************
    {exp:socialeesta:tweet url="{title_permalink='blog/entry'}" type="js" via="bsdwire" text="{title}" count_position="horizontal"}
    
    ==============================
    = Twitter "Follow" Button Parameters =
    ==============================
    
    Required Parameters
    **************************
    - user  :   Default value: none  :  Which user to follow. Do not include the '@'.

    Optional Parameters
    **************************
    - type  :  "js" or "iframe"  :  Default value: "iframe"  :  Defines whether to use Javascript version or IFRAME version of the Follow Button.
    - follower_count  :  "yes" or "no"  :  Default value: "no"  :  Whether to display the follower count adjacent to the follow button. 
    - button_color  :  "blue" or "grey"  :  Default value: "blue"  :  Change the color of the button itself.
    - text_color  :  Default value: none  :  Specify a hexadecimal color code for the "Followers count" and "Following state" text
    - link_color  :  Default value: none  :  Specify a hexadecimal color code for the Username text
    - lang  :  Default value: "en"  :  Specify the language for the button using ISO-639-1 Language code. Defaults to "en" (english).
    - include_js  :  "yes" or "no"  :  Default value: "yes"  :  If "yes", the Twitter widget.js file will be loaded.


    Javascript button specific parameters — not supported with IFRAME version
    **********************************************************************************
    - width  :  A pixel or percentage value to set the button element width
    - align  :  "right" or "left" - Defaults to "left".


    Example tag:
    **************
    {exp:socialeesta:follow user="bsdwire" follower_count="yes" type="js"}
    
    
    =============================
    = Facebook Like Button Parameters =
    =============================
    
    All parameters are optional, but the button won't function as expected without at least a "url".
        
        - url  :  The URL to Like on Facebook. Defaults to the Site Index (homepage) if no value is present.
        - type  :  "iframe" or "xfbml"  :  Defaults to "iframe". **If you choose "xfbml", you must include the Facebook Javascript SDK on your page.**
        - layout  :  "standard", "button_count" or "box_count"  :  Default value: "standard"  :  1) "standard" : No counter is displayed; 2) "button_count" : A counter is displayed to the right of the like button; 3) "box_count" : A counter is displayed above the like button
        - faces  :  "yes" or "no"  :  Default value: "no"  :  whether to display profile photos below the button (standard layout only)
        - verb  :  "like" or "recommend"  :  Default value: "like".
        - color  :  "light" or "dark"  :  Default value: "light".


        IFRAME specific parameters, not supported in the XFBML version
        ************************************************************************
        The height and width parameters have default values that depend upon the button layout chosen. Refer to Facebook's documentation for more info: https://developers.facebook.com/docs/reference/plugins/like/
        
        - width  :  a value in pixels
        - height  :  a value in pixels
        

    Example tag: 
    **************
    {exp:socialeesta:like url="{pages_url}" type="iframe" verb="recommend" color="light" layout="button_count"}
    
<?php
        $buffer = ob_get_contents();
        ob_end_clean();
        return $buffer;
    }
}


/* End of file pi.socialeesta.php */
/* Location: /system/expressionengine/third_party/socialeesta/pi.socialeesta.php */
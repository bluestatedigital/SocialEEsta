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
 * @author      Douglas Back, Blue State Digital
 * @link        http://www.bluestatedigital.com
 */

$plugin_info = array(
    'pi_name'       => 'BSD SocialEEsta',
    'pi_version'    => '1.1',
    'pi_author'     => 'Douglas Back',
    'pi_author_url' => 'http://www.bluestatedigital.com',
    'pi_description'=> 'Generate social sharing plugins for your EE pages.',
    'pi_usage'      => Socialeesta::usage()
);

require_once 'Utils/QueryString.php';
require_once 'Utils/DataAttrs.php';

class Socialeesta {
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->EE =& get_instance();
    }
    
    public function tweet()
    {
        require_once 'TemplateParams/TwitterTweet.php';
        
        $params = new TemplateParams_TwitterTweet($this->EE->TMPL);


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
                $queryString->addParam('size', $params->getSize());
                $iframe = new Tweet_Iframe($queryString);
                return $iframe->getHtml();
                
            case 'html5':
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
                $dataAttrs->addAttr('size', $params->getSize());
                
                $button = new Tweet_JS(new TwitterJS(), $dataAttrs, $params->getCssId(), $params->getCssClass());
                $button->setId($params->getCssId());
                $button->setClass($params->getCssClass());
                $button->setIncludeJS($params->getIncludeJS());
                return $button->getHtml($params->getLinkText());                
        }
    }
    
    function follow(){
        require_once 'TemplateParams/TwitterFollow.php';

        $params = new TemplateParams_TwitterFollow($this->EE->TMPL);
        switch ($params->getType()) {
            case 'iframe':
                require_once 'TwitterButtons/Follow_Iframe.php';
                $queryString = new QueryString();
                $queryString->addParam('screen_name', $params->getUser());
                $queryString->addParam('show_count', $params->getFollowerCount() ? "true" : "false");
                $queryString->addParam('show_screen_name', $params->getShowScreenName() ? "true" : "false");
                $queryString->addParam('lang', $params->getLang());
                $queryString->addParam('size', $params->getSize());
                $iframe = new Follow_Iframe($queryString, $params->getWidth());
                return $iframe->getHtml();
            case 'html5':
            default:
                require_once 'TwitterButtons/Follow_JS.php';
                require_once 'Script/TwitterJS.php';
                $dataAttr = new DataAttrs();
                $dataAttr->addAttr('screen-name', $params->getUser());
                $dataAttr->addAttr('show-screen-name', $params->getShowScreenName() ? "true" : "false");
                $dataAttr->addAttr('show-count', $params->getFollowerCount() ? "true" : "false");
                $dataAttr->addAttr('lang', $params->getLang());
                $dataAttr->addAttr('width', $params->getWidth());
                $dataAttr->addAttr('align', $params->getAlign());
                $dataAttr->addAttr('size', $params->getSize());
                $button = new Follow_JS(new TwitterJS(), $dataAttr);
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
        $params->setFacebook();
        $params->setTwitter();
        $params->setGoogle();
        
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
    SocialEEsta adds social buttons to your ExpressionEngine pages with no fuss.

    It supports Twitter's Tweet & Follow buttons, Facebook's Like button, and Google's +1 button.

    SocialEEsta defaults to the HTML5 versions of these buttons; use the {exp:socialeesta:scripts} tag to add the Javascript required for each of these buttons to work.

    The tags:
    =======
    {exp:socialeesta:scripts}
    {exp:socialeesta:tweet}
    {exp:socialeesta:follow}
    {exp:socialeesta:like}
    {exp:socialeesta:plusone}

    ========================================================
    = Load Javascript Required by Social Buttons: {exp:socialeesta:scripts}  =
    ========================================================

    Example tag:
    **************
    {exp:socialeesta:scripts scripts="facebook|twitter" fb_app_id="123456789" fb_channel_url="//www.yourdomain.com/path/to/channel.html"}

    SocialEEsta provides the asynchronous version of all three scripts libraries.

        - scripts : "facebook", "twitter", "google" :  A pipe-separated list of Javascript libraries to include.
        - fb_app_id  :  Your site's Facebook App ID. Required if you are loading the Facebook Javascript SDK.
        - fb_channel_url  :  This is optional, but Facebook recommends it. See https://developers.facebook.com/docs/reference/javascript/ for more information.



    =====================================
    = Twitter Tweet Button: {exp:socialeesta:tweet} =
    =====================================

    Example tag:
    **************
    {exp:socialeesta:tweet url="{title_permalink='blog/entry'}" type="iframe" via="bsdwire" text="{title}" count_position="vertical"}

    All Parameters are optional.

        - url  :  The URL to share on Twitter. The URL should be absolute.
        - type  :  "html5", "iframe" :  Default value: "html5"  :  Defines whether to use HTML5 version or iframe version of the Tweet Button.
        - count_url  :  The URL to which your shared URL resolves to; useful is the URL you are sharing has already been shortened. This affects the display of the Tweet count.
        - via  :  Screen name of the user to attribute the Tweet to.
        - text  :  Text of the suggested Tweet.
        - count_position  :  "none", "horizontal", or "vertical"  :  Default value: "horizontal".
        - related  :  Up to 2 related accounts, separated by a comma. These accounts are suggested to the user after they publish the Tweet.
        - size  : "large" or "medium  :  Default value: "medium"  : Specifies the size of the button.

        See Twitter's documentation for additional information about any of the above parameters: https://dev.twitter.com/docs/tweet-button



    ======================================
    = Twitter Follow Button: {exp:socialeesta:follow}  =
    ======================================

    Example tag:
    **************
    {exp:socialeesta:follow user="bsdwire" follower_count="yes" type="iframe"}

    Required Parameters
    **************************
    - user  :   Default value: none  :  Which user to follow. Do not include the '@'.

    Optional Parameters
    **************************
    - type  :  "html5" or "iframe"  :  Default value: "html5"  :  Defines whether to use HTML5 version or iframe version of the Follow Button.
    - show_screen_name  :  "yes" or "no"  : Default value: "yes"  :  Defines whether to display the username within the button
    - follower_count  :  "yes" or "no"  :  Default value: "no"  :  Whether to display the follower count adjacent to the follow button. 
    - lang  :  Default value: "en"  :  Specify the language for the button using ISO-639-1 Language code. Defaults to "en" (english).
    - size  : "large" or "medium  :  Default value: "medium"  : Specifies the size of the button.
    
    Javascript button specific parameters — not supported with iframe version
    **********************************************************************************
    - width  :  A pixel or percentage value to set the button element width
    - align  :  "right" or "left" - Defaults to "left".

    See Twitter's documentation for additional information about any of the above parameters: https://dev.twitter.com/docs/follow-button


    =====================================
    = Facebook Like Button: {exp:socialeesta:like} =
    =====================================

    Example tag: 
    **************
    {exp:socialeesta:like href="{pages_url}" type="iframe" action="recommend" color="light" layout="button_count"}

    All parameters are optional.

    - href  :  The URL to Like on Facebook. Default value: the page on which the button is present.
    - type  :  "html5" or "iframe" :  Defaults to "html5". 
    - layout  :  "standard", "button_count" or "box_count"  :  Default value: "button_count"  :  1) "standard" : No counter is displayed; 2) "button_count" : A counter is displayed to the right of the like button; 3) "box_count" : A counter is displayed above the like button
    - action  :  "like" or "recommend"  :  Default value: "like".
    - color  :  "light" or "dark"  :  Default value: "light".
    - font :  "arial", "lucida grande", "segoe ui", "tahoma", "trebuchet ms", "verdana" : Default value: "lucida grande" (Facebook's default)

        Layout-specific parameters
        ******************************
        The height and width parameters have default values that depend upon the button layout chosen. Refer to Facebook's documentation for more info: https://developers.facebook.com/docs/reference/plugins/like/
        
        - show_faces  :  "true" or "false"  :  Default value: "false"  :  whether to display profile photos below the button (standard layout only)
        - width  :  a value in pixels
        - height  :  a value in pixels



    ==========================================
    = Google +1 Button: {exp:socialeesta:plusone} =
    ==========================================

    Example tag: 
    **************
    {exp:socialeesta:plusone size="standard" annotation="inline" href="{site_url}"}

    All parameters are optional:

        - href  :  The URL to publicly +1. Defaults to the page on which the button is present.
        - size  :  'small', 'medium', 'standard', or 'tall  :  Default value: 'medium'.
        - annotation  :  'none', 'bubble', or 'inline'  :  Default value: bubble. 
        - width  :  a value in pixels (e.g. '250')  :  Applied only to buttons where annotation="inline"
        - callback  :  If specified, this function is called after the user clicks the +1 button. 
        
        See the Google +1 button docs for additional details: https://developers.google.com/+/plugins/+1button/


    
<?php
        $buffer = ob_get_contents();
        ob_end_clean();
        return $buffer;
    }
}


/* End of file pi.socialeesta.php */
/* Location: /system/expressionengine/third_party/socialeesta/pi.socialeesta.php */
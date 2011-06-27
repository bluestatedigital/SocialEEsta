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
    'pi_version'    => '1.0b5',
    'pi_author'     => 'Douglas Back',
    'pi_author_url' => 'http://www.bluestatedigital.com',
    'pi_description'=> 'Generate social sharing plugins for your EE pages.',
    'pi_usage'      => Socialeesta::usage()
);


class Socialeesta {

    public $return_data;
    
    private static $tw_js = "http://platform.twitter.com/widgets.js"; // The location of the Twitter widgets.js file
    private static $tw_share_url = "http://twitter.com/share"; // The Twitter Share URL
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->EE =& get_instance();
    }
    
    function tweet()
    {
        // Pull params into local vars
        $type = $this->EE->TMPL->fetch_param('type','iframe');
        $url = $this->EE->TMPL->fetch_param('url', NULL);
        $count_url = $this->EE->TMPL->fetch_param('count_url', NULL);
        $via = $this->EE->TMPL->fetch_param('via', NULL);
        $text = $this->EE->TMPL->fetch_param('text', NULL);
        $count_position = $this->EE->TMPL->fetch_param('count_position', NULL);
        $related = $this->EE->TMPL->fetch_param('related');
        $class = $this->EE->TMPL->fetch_param('class');
        $id = $this->EE->TMPL->fetch_param('id');
        $link_text = $this->EE->TMPL->fetch_param('link_text', 'Tweet');
        $include_js = $this->EE->TMPL->fetch_param('include_js', 'yes');
        
        // Build query string based on set params — only include params that exist:
        $query_string = '?';
        $url ? $query_string .= 'url=' . urlencode($url) . '&amp;' : false;
        $count_url ? $query_string .= 'count_url=' . urlencode($count_url) . '&amp;' : false;
        $via ? $query_string .= 'via=' . urlencode($via) . '&amp;' : false;
        $text ? $query_string .= 'text=' . $text . '&amp;' : false;
        $related ? $query_string .= 'related=' . $related . '&amp;' : false;
        $count_position ? $query_string .= 'count=' . $count_position : false;
        
        
        // Build the $tweet_button depending on whether type= js, iframe, or none
        switch ( $type ) 
        {
            case "js":
            $js = "<script>\n"
            . "(function(){\n"
            . "if ( !window.twttr ){\n"
            . "var twsc = document.createElement('script');\n"
            . "twsc.type = 'text/javascript';\n"
            . "twsc.src = '"  . self::$tw_js . "';\n"
            . "document.body.appendChild(twsc);\n"
            . "console.log ( twsc );\n"
            . "}})();"
            . "</script>";
            //$js = '<script>window.twttr || document.write(\'<script src="' . self::$tw_js . '">\x3C/script>\')</script>';
            
                $tweet_button = '<a class="twitter-share-button';
                if ( isset($class) ) {
                    $tweet_button .= ' ' . $class;
                }
                $tweet_button .= '"'; // close the quote
                if ( isset($id) ){
                    $tweet_button .= ' id="' . $id . '"'; 
                }
                $tweet_button .= ' href="' . self::$tw_share_url . $query_string . '">' . $link_text . '</a>' ;
                if ($include_js === "yes"){
                    $tweet_button = $js . "\n" . $tweet_button;
                }
                break;
            case "iframe";
            default:
                $iframe_url = "http://platform.twitter.com/widgets/tweet_button.html";
                $tweet_button = '<iframe allowtransparency="true" frameborder="0" scrolling="no" src="' . $iframe_url . $query_string . '" style="width:130px; height:';
                $count_position === "vertical" ? $tweet_button .= '62px' : $tweet_button .= '20px';
                $tweet_button .= ';"></iframe>';
                break;
                

        }
        return $tweet_button;
    }
    
    function follow(){
        // Pull params into local vars
        $type = $this->EE->TMPL->fetch_param('type', 'iframe');
        $user = $this->EE->TMPL->fetch_param('user');
        $follower_count = $this->EE->TMPL->fetch_param('follower_count',NULL);
        // If we're displaying a follower count, default to 300px width; else default to 200px. Plugin params override though...
        $follower_count === "yes" ? $width = $this->EE->TMPL->fetch_param('width','300') : $width = $this->EE->TMPL->fetch_param('width','200');
        $button_color = $this->EE->TMPL->fetch_param('button_color','blue');
        $text_color = $this->EE->TMPL->fetch_param('text_color', NULL);
        $link_color = $this->EE->TMPL->fetch_param('link_color', NULL);
        $lang = $this->EE->TMPL->fetch_param('lang', 'en');
        $align = $this->EE->TMPL->fetch_param('align', NULL);
        $class = $this->EE->TMPL->fetch_param('class', NULL);
        $id = $this->EE->TMPL->fetch_param('id', NULL);
        $include_js = $this->EE->TMPL->fetch_param('include_js', 'yes');
        $include_js === "yes" ? $include_js = true : $include_js = false; // convert to boolean!
        //Set Base URLs
        switch ( $type ){
            
            case "js":
                // Simple conditional to load the Twitter widgets.js file only if the twttr object doesn't exist
                $js = "<script>\n"
                . "(function(){\n"
                . "if ( !window.twttr ){\n"
                . "var twsc = document.createElement('script');\n"
                . "twsc.type = 'text/javascript';\n"
                . "twsc.src = '"  . self::$tw_js . "';\n"
                . "document.body.appendChild(twsc);\n"
                . "console.log ( twsc );\n"
                . "}})();"
                . "</script>";
                $follow_button = '<a class="' . $class . '" id="' . $id . '" href="http://twitter.com/' . $user 
                                    . '" data-button="' . $button_color 
                                    . '" data-show-count="' . $follower_count 
                                    . '" data-text-color="' . $text_color 
                                    . '" data-link-color="' . $link_color 
                                    . '" data-lang="' . $lang 
                                    . '" data-width="' . $width 
                                    . '" data-align="' . $align 
                                    . '">Follow @' . $user . '</a>';
                if ( $include_js ){
                    $follow_button .= "\n" . $js;
                }
                break;
            case "iframe";
            default:

                $follow_button = '<iframe allowtransparency="true" frameborder="0" scrolling="no" src="http://platform.twitter.com/widgets/follow_button.html?screen_name=' . $user;
                
                //Build iframe query string...
                $follower_count === "yes" ? $follow_button .= '&amp;show_count=true'  : $follow_button .= '&amp;show_count=false';
                $follow_button .= '&amp;button=' . $button_color ;
                isset($text_color) ? $follow_button .= '&amp;text_color=' . $text_color : false;
                isset($link_color) ? $follow_button .= '&amp;link_color=' . $link_color : false;
                $follow_button .= '&amp;lang=' . $lang;
                $follow_button .= '" style="width:' . $width . 'px; height:20px;"></iframe>';
                break;
                
            
        }
        return $follow_button;
    } // end function follow()
    
    function like(){ //Facebook Like Buttons
        global $IN;
        // Assign variables to params or defaults.
        $url = $this->EE->TMPL->fetch_param('url', $this->EE->uri->config->config["site_url"]);
        $type = $this->EE->TMPL->fetch_param('type', 'iframe');
        $layout = $this->EE->TMPL->fetch_param('layout', 'standard');
        $faces = $this->EE->TMPL->fetch_param('faces', 'false');
        $faces === "yes" ? $faces = true : $faces = false; // convert to boolean
        switch ( $layout ){ //The like button has 3 layout modes; each has their own default height/width values
            case "standard":
                $width = $this->EE->TMPL->fetch_param('width', '450');
                // Use the $faces param to figure height default for standard layout
                $faces ? $height = $this->EE->TMPL->fetch_param('height', '80') : $height = $this->EE->TMPL->fetch_param('height', '35');
                break;
            case "button_count":
                $width = $this->EE->TMPL->fetch_param('width', '90');
                $height = $this->EE->TMPL->fetch_param('height', '20');
                break;
            case "box_count":
                $width = $this->EE->TMPL->fetch_param('width', '55');
                $height = $this->EE->TMPL->fetch_param('height', '65');
                break;

        }
        $verb = $this->EE->TMPL->fetch_param('verb', 'like');
        $color = $this->EE->TMPL->fetch_param('color', 'light');
        
        // Build Like Button Code
        
        switch ( $type ){
            case "xfbml":
                $like_button = '<fb:like href="' . $url . '" send="false" width="' . $width . '" show_faces="' . $faces . '" colorscheme="' . $color .'" font=""></fb:like>';
                break;
            case "iframe";
            default:
                $like_button = '<iframe src="http://www.facebook.com/plugins/like.php?href=' . urlencode($url) . '&amp;send=false&amp;layout=' . $layout .'&amp;width=' . $width . '&amp;show_faces=' . $faces . '&amp;action=' . $verb . '&amp;colorscheme=' . $color . '&amp;font&amp;height=' . $height . '" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:' . $width . 'px; height:' . $height . 'px;" allowTransparency="true"></iframe>';
                break;
        } // end switch($type)
        
        return $like_button;
        
    }
    
    // function plusone() {
    //     
    //             
    // } // end plusone
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
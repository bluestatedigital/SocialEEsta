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
    'pi_description'=> 'A simple plugin that will add a Facebook "Like", "Share", and Twitter "Tweet" button',
    'pi_usage'      => SocialEEsta::usage()
);


class Socialeesta {

    public $return_data;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->EE =& get_instance();
    }
    
    function twitter()
    {
        // Pull params into local vars
        $type = $this->EE->TMPL->fetch_param('type');
        $url = $this->EE->TMPL->fetch_param('url');
        $count_url = $this->EE->TMPL->fetch_param('count_url');
        $via = $this->EE->TMPL->fetch_param('via');
        $text = $this->EE->TMPL->fetch_param('text');
        $count_position = $this->EE->TMPL->fetch_param('count');
        $related = $this->EE->TMPL->fetch_param('related');
        $class = $this->EE->TMPL->fetch_param('class');
        $id = $this->EE->TMPL->fetch_param('id');
        $this->EE->TMPL->fetch_param('link_text') ? $link_text = $this->EE->TMPL->fetch_param('link_text') : $link_text = "Tweet";
        
        // Build query string based on set params:
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
                $js = '<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>';
                $tweet_button = '<a href="http://twitter.com/share' . $query_string . '" class="twitter-share-button">Tweet</a>';
                $tweet_button = $js . "\n" . $tweet_button;
                break;
            case "iframe":
                $iframe_url = "http://platform.twitter.com/widgets/tweet_button.html" . $query_string;
                $tweet_button = '<iframe allowtransparency="true" frameborder="0" scrolling="no" src="' . $iframe_url . '" style="width:130px; height:50px;"></iframe>';
                break;
            case "none":
                $tweet_button = '<a';
                if ( isset($class) ) {
                    $tweet_button .= ' class="' . $class . '"';
                }
                if ( isset($id) ){
                    $tweet_button .= ' id="' . $id . '"'; 
                }
                $tweet_button .= ' href="http://twitter.com/share' . $query_string . '">' . $link_text . '</a>' ;
                break;
            default:
                $iframe_url = "http://platform.twitter.com/widgets/tweet_button.html";
                $tweet_button = '<iframe allowtransparency="true" frameborder="0" scrolling="no" src="' . $iframe_url . '" style="width:130px; height:50px;"></iframe>';
                break;
                

        }
        return $tweet_button;
    }
    
    function facebook(){
        
        // Assign variables to params or defaults.
        $this->EE->TMPL->fetch_param('url') ? $url = $this->EE->TMPL->fetch_param('url') : $url = fetch_site_index(1,0);
        $this->EE->TMPL->fetch_param('type') ? $type = $this->EE->TMPL->fetch_param('type') : $type = "iframe";
        $this->EE->TMPL->fetch_param('layout') ? $layout = $this->EE->TMPL->fetch_param('layout') : $layout = 'standard';
        $this->EE->TMPL->fetch_param('faces') ? $faces = $this->EE->TMPL->fetch_param('faces') : $faces = "false";
        $this->EE->TMPL->fetch_param('width') ? $width = $this->EE->TMPL->fetch_param('width') : $width = "250";
        $this->EE->TMPL->fetch_param('verb') ? $verb = $this->EE->TMPL->fetch_param('verb') : $verb = "like";
        $this->EE->TMPL->fetch_param('color') ? $color = $this->EE->TMPL->fetch_param('color') : $color = "light";
        
        // Build Like Button Code
        switch ( $type ){
            case "xfbml":
                $like_button = '<fb:like href="' . $url . '" send="false" width="' . $width . '" show_faces="' . $faces . '" colorscheme="' . $color .'" font=""></fb:like>';
                break;
            case "iframe";
            default:
                $like_button = '<iframe src="http://www.facebook.com/plugins/like.php?href=' . urlencode($url) . '&amp;send=false&amp;layout=' . $layout .'&amp;width=' . $width . '&amp;show_faces=' . $faces . '&amp;action=' . $verb . '&amp;colorscheme=' . $color . '&amp;font&amp;height=35" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:' . $width . 'px; height:35px;" allowTransparency="true"></iframe>';
                break;
        } // end switch($type)
        
        return $like_button;
        
    }
    // ----------------------------------------------------------------
    
    /**
     * Plugin Usage
     */
    public static function usage()
    {
        ob_start();
?>
    This plugin has two uses:
    
    - Generate a Twitter "Tweet" button
    - Generate a Facebook "Like" button
    
    Twitter Parameters (based on Tweet Button specs). All Parameters are optional, but the Tweet Button won't function as expected without at least "url" or "text".
    
        - url : The URL to share on Twitter. The URL should be absolute.
        - type : "iframe", "js", or "none". If no type is specified, defaults to iframe. The "js" version will also insert the Javascript.
        - count_url : The URL to which your shared URL resolves to; useful is the URL you are sharing has already been shortened. This affects the display of the Tweet count.
        - via : Screen name of the user to attribute the Tweet to.
        - text : Text of the suggested Tweet.
        - count_position : If set, determines where the counter is display. Valid values are "none", "horizontal", and "vertical". Defaults to "none".
        - related : Related accounts.
        - class : Assign a class attribute to the <a> element. Only used when type="none".
        - id : Assigns an ID attribute to the <a> element. Only used when type="none".
        - link_test : If type="none", this will display as the text of the "Tweet" link. Defaults to "Tweet"
    Example tag: {exp:socialeesta:twitter url="{title_permalink='blog/entry'}" type="js" via="bsdwire" text="{title}" count_position="horizontal"}
    
    Facebook Like Button Parameters. 
    
    All parameters are optional, but the button won't function as expected without at least a "url".
    
        - url : The URL to Like on Facebook. Defaults to the Site Index (homepage) if no value is present.
        - type : "iframe" or "xfbml". Defaults to "iframe". If you choose "xfbml", you must include the Facebook Javascript SDK on your page.
        - layout : Accepts one of three options:
                    - "standard" : No counter is displayed
                    - "button_count" : A counter is displayed to the right of the like button
                    - "box_count" : A counter is displayed above the like button
        - faces : whether to display profile photos below the button (standard layout only)
        - width : the width of the like button. Defaults to 250px.
        - verb : "like" or "recommend". Defaults to "like".
        - color : "light" or "dark". Defaults to "light".
        
    Example tag: {exp:socialeesta:facebook url="{pages_url}" type="iframe" verb="recommend" color="light" layout="button_count" width="450"}
    
<?php
        $buffer = ob_get_contents();
        ob_end_clean();
        return $buffer;
    }
}


/* End of file pi.socialeesta.php */
/* Location: /system/expressionengine/third_party/bsd_socialeesta/pi.socialeesta.php */
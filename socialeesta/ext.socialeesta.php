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
 * Socialeesta Extension
 *
 * @package     ExpressionEngine
 * @subpackage  Addons
 * @category    Extension
 * @author      Douglas Back
 * @link        http://www.bluestatedigital.com
 */

class Socialeesta_ext {
    
    public $settings        = array();
    public $description     = 'Stores settings for Facebook Connect and Twitter widgets.js';
    public $docs_url        = '';
    public $name            = 'Socialeesta';
    public $settings_exist  = 'y';
    public $version         = '1.0';
    
    private $EE;
    
    /**
     * Constructor
     *
     * @param   mixed   Settings array or empty string if none exist.
     */
    public function __construct($settings = '')
    {
        $this->EE =& get_instance();
        $this->settings = $settings;
    }
    
    // ----------------------------------------------------------------------
    
    /**
     * Settings Form
     *
     * If you wish for ExpressionEngine to automatically create your settings
     * page, work in this method.  If you wish to have fine-grained control
     * over your form, use the settings_form() and save_settings() methods 
     * instead, and delete this one.
     *
     * @see http://expressionengine.com/user_guide/development/extensions.html#settings
     */
    public function settings()
    {
        return array(
            "include_tw" => array('r', array('y' => 'Yes', 'n' => "No"), "n"),
            "include_goog" => array('r', array('y' => 'Yes', 'n' => "No"), "n"),
            "include_fb" => array('r', array('y' => 'Yes', 'n' => "No"), "n"),
            "fb_app" => array('i', ' ', ""),
            "fb_channelUrl" => array('i', ' ', "")
            
        );
    }
    
    // ----------------------------------------------------------------------
    
    /**
     * Activate Extension
     *
     * This function enters the extension into the exp_extensions table
     *
     * @see http://codeigniter.com/user_guide/database/index.html for
     * more information on the db class.
     *
     * @return void
     */
    public function activate_extension()
    {
        // Setup custom settings in this array.
        $defaults = $this->settings();
        
        
        
        // No hooks selected, add in your own hooks installation code here.
        $this->EE->db->insert('extensions',
            array(
                'class' => __CLASS__,
                'method' => 'socialeesta_ext',
                'hook' => 'socialeesta_ext',
                'settings' => serialize($this->settings),
                'priority' => 10,
                'version' => $this->version,
                'enabled' => 'y'
                )
            );
    }   

    // ----------------------------------------------------------------------

    /**
     * Disable Extension
     *
     * This method removes information from the exp_extensions table
     *
     * @return void
     */
    function disable_extension()
    {
        $this->EE->db->where('class', __CLASS__);
        $this->EE->db->delete('extensions');
    }

    // ----------------------------------------------------------------------

    /**
     * Update Extension
     *
     * This function performs any necessary db updates when the extension
     * page is visited
     *
     * @return  mixed   void on update / false if none
     */
    function update_extension($current = '')
    {
        if ($current == '' OR $current == $this->version)
        {
            return FALSE;
        }
    }   
    
    // ----------------------------------------------------------------------
}

/* End of file ext.socialeesta.php */
/* Location: /system/expressionengine/third_party/socialeesta/ext.socialeesta.php */
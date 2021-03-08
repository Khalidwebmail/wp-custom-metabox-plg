<?php

/**
 * Plugin Name:       WP My Metabox
 * Plugin URI:        https://example.com/
 * Description:       Use to store custom meta info
 * Version:           1.0.0
 * Author:            Khalid Ahmed
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * Text Domain:       wp-my-metabox
 */

if( ! defined("ABSPATH")){
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';
/**
 * Plugin Class name
 */

final class My_Metabox {
    
    /**
     * Plugin version
     */
    const version = "1.0";

    private function __construct()
    {
        $this->define_constants();

        register_activation_hook( __FILE__, [ $this, 'activate' ] );
        add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
    }
    
    /**
     * initialize singleton instance
     *
     * @return \My_Metabox
     */
    public static function init()
    {
        static $instance  = false;

        if(! $instance) {
            $instance = new self();
        }

        return $instance;
    }
    
    /**
     * define required plugins constants
     *
     * @return void
     */
    public function define_constants()
    {
        define('WD_MY_META_VERSION', self::version);
        define("WD_MY_META_FILE", __FILE__);
        define("WD_MY_META_PATH", __DIR__);
        define("WD_MY_META_URL", plugins_url('', WD_MY_META_FILE));
        define("WD_MY_META_ASSETS", WD_MY_META_URL . '/assets');
    }
        
    /**
     * initialize the plugin
     *
     * @return void
     */

    public function init_plugin()
    {
        
    }

    /**
     * Do stuff upon plugin activation
     *
     * @return void
     */
    public function activate() 
    {
        $installed = get_option("WD_MY_META_installed");
        if( ! $installed ) {
            update_option('WD_MY_META_installed', time());
        }
        update_option('WD_MY_META_version', WD_MY_META_VERSION);
    }
}

/**
 * iniitalize the main plugin
 *
 * @return \My_Metabox
 */
function My_Metabox()
{
    return My_Metabox::init();
}

/**
 * Kick of plugin
 */
My_Metabox();
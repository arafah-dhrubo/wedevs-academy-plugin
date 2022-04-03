<?php

/**
 * Plugin Name: WeDevs Academy Plugin
 * Plugin URI: https://example.com/plugin-name
 * Description: A basic plugin
 * Version: 1.0.0
 * Requires at least: 5.2
 * Requires PHP: 7.2
 * Author: Your Name
 * Author URI: https://example.com
 * Text Domain: Wdap-plugin
 * License: GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI: https://example.com/my-plugin/
 */

use WeDevs\Academy\Admin;
use WeDevs\Academy\Frontend;

defined('ABSPATH') || exit;

require_once __DIR__ . '/vendor/autoload.php';

final class Lets_Start_The_Journey
{

    /**
     * Plugin version
     */
    const version = '1.0.0';

    private function __construct()
    {
        $this->define_constants();
        register_activation_hook(__FILE__, [$this, 'activate']);
        add_action('plugins_loaded', [$this, 'init_plugin']);
    }

    /**
     * Initializing a singleton instance
     * 
     * @return plugin
     */
    public static function init()
    {
        static $instance = false;
        if (!$instance) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Define constants
     */
    public function define_constants()
    {
        define('WDAP_VERSION', self::version);
        define('WDAP_FILE', __FILE__);
        define('WDAP_PATH', __DIR__);
        define('WDAP_URL', plugins_url('', WDAP_FILE));
        define('WDAP_ASSETS', WDAP_URL . '/assets');
    }

    /**
     * Activate the plugin
     */
    public function activate()
    {
        $installed = get_option('wdap_installed');
        if (!$installed) {
            update_option('wdap_installed', time());
        }
        update_option('wdap_version', WDAP_VERSION);
    }

    public function init_plugin()
    {
        if(is_admin()){
            new Admin();
        }else{
            new Frontend();
        }
    }
}

/**
 * Initialization of the main plugin
 * 
 */
function wdap_plugin()
{
    return Lets_Start_The_Journey::init();
}

/**
 * Kick-off the plugin
 */

wdap_plugin();

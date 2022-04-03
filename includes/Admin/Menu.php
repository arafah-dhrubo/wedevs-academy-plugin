<?php

namespace WeDevs\Academy\Admin;
/**
 * The menu handler class
 */
class Menu
{
    function __construct(){
        add_action('admin_menu',[$this, 'admin_menu']);
    }

    public function admin_menu(){
        $capability = 'manage_options';
        add_menu_page(
            __('WeDevs Academy', 'wdap-plugin'),
            __('Academy', 'wdap-plugin'),
            $capability,
            'wedevs-academy',
            [$this, 'plugin_page'],
            'dashicons-welcome-learn-more'
        );
    }

    public function plugin_page(){
        echo "Hello world";
    }
}
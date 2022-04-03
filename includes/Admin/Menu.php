<?php

namespace WeDevs\Academy\Admin;
/**
 * The menu handler class
 */
class Menu
{
    public $addressbook;

    function __construct($addressbook)
    {
        $this->addressbook = $addressbook;
        add_action('admin_menu', [$this, 'admin_menu']);
    }

    public function admin_menu()
    {
        $capability = 'manage_options';
        $parent_slug = 'wedevs-academy';
        add_menu_page(
            __('WeDevs Academy', 'wedevs-academy'),
            __('Academy', 'wedevs-academy'),
            $capability,
            $parent_slug,
            [$this->addressbook, 'plugin_page'],
            'dashicons-welcome-learn-more'
        );
        add_submenu_page(
            $parent_slug,
            __('Address Book', 'wedevs-academy'),
            __('Address Book', 'wedevs-academy'),
            $capability,
            $parent_slug,
            [$this->addressbook, 'plugin_page']
        );
        add_submenu_page(
            $parent_slug,
            __('Settings', 'wedevs-academy'),
            __('Settings', 'wedevs-academy'),
            $capability,
            'wedevs-settings',
            [$this, 'plugin_page']
        );
    }
}
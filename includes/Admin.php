<?php

namespace WeDevs\Academy;

use WeDevs\Academy\Admin\Addressbook;

/**
 * The Admin handler
 */
class Admin
{
    function __construct(){
        new Admin\Menu();
        $this->dispatch_actions();
    }

    public function dispatch_actions(){
        $addressbook = new Addressbook();
        add_action('admin_init', [$addressbook, 'form_handler']);
    }
}
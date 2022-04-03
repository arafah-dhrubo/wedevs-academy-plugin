<?php

namespace WeDevs\Academy;

use WeDevs\Academy\Admin\Addressbook;

/**
 * The Admin handler
 */
class Admin
{
    function __construct(){
        $addressbook = new Addressbook();
        $this->dispatch_actions($addressbook);
        new Admin\Menu($addressbook);
    }

    public function dispatch_actions($addressbook){
        add_action('admin_init', [$addressbook, 'form_handler']);
    }
}
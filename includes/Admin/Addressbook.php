<?php

namespace WeDevs\Academy\Admin;

class Addressbook
{
    public $erros=[];

    public function plugin_page()
    {
        $action = isset($_GET['action']) ? $_GET['action'] : 'list';

        switch ($action) {
            case 'new':
                $template = __DIR__ . '\views\address-new.php';
                break;
            case 'edit':
                $template = __DIR__ . '\views\address-edit.php';
                break;
            case 'view':
                $template = __DIR__ . '\views\address-view.php';
                break;
            default:
                $template = __DIR__ . '\views\address-list.php';
                break;
        }

        if (file_exists($template)) {
            include $template;
        }
    }

    /**
     * Handle the form
     * @return void
     */
    public function form_handler()
    {
        if (!isset($_POST['submit_address'])) {
            return;
        }
        if(!wp_verify_nonce($_POST['_wpnonce'], 'new-address')){
            wp_die('Are you cheating?');
        }
        if(!current_user_can('manage_options')){
            wp_die('Hey Are you cheating?');
        }

        $name = isset($_POST['name'])?sanitize_text_field($_POST['name']):'';
        $phone = isset($_POST['phone'])?sanitize_text_field($_POST['phone']):'';
        $email = isset($_POST['email'])?sanitize_text_field($_POST['email']):'';
        $address = isset($_POST['address'])?sanitize_textarea_field($_POST['address']):'';

        if(empty($name)){
            $this->erros['name']=__('Please provide a name', 'wedevs-academy');
        }
        if(empty($email)){
            $this->erros['email']=__('Please provide a email', 'wedevs-academy');
        }
        if(empty($phone)){
            $this->erros['phone']=__('Please provide a phone', 'wedevs-academy');
        }

        if(!empty($this->erros)){
            return;
        }

        $insert_id = wd_ac_insert_address([
            'name'=>$name,
            'phone'=>$phone,
            'email'=>$email,
            'address'=>$address
        ]);

        if(is_wp_error($insert_id)){
            wp_die($insert_id->get_error_message());
        }

        $redirected_to=admin_url('admin.php?page=wedevs-academy&inserted=true');
        wp_redirect($redirected_to);
    }
}
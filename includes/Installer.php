<?php

namespace WeDevs\Academy;

class Installer
{
    public function run()
    {
        $this->add_version();
        $this->create_tables();
    }

    public function add_version()
    {
        $installed = get_option('wd_academy_installed');

        if (!$installed) {
            update_option('wd_academy_installed', time());
        }

        update_option('wd_academy_installed', WD_ACADEMY_VERSION);
    }

    public function create_tables()
    {
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        $schema = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}ac_addresses` (
            `id` int(11) NOT NULL,
            `name` varchar(100) NOT NULL,
            `address` text NOT NULL,
            `phone` varchar(30) NOT NULL,
            `email` varchar(255) NOT NULL,
            `created_by` bigint(20) UNSIGNED NOT NULL,
            `created_at` datetime NOT NULL
        ) $charset_collate";

        if(!function_exists('dbDelta')){
            require_once ABSPATH.'wp-admin/includes/upgrade.php';
            dbDelta( $schema );
        }
    }
}
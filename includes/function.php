<?php

/**
 * Insert new address
 * @param $args
 * @return int|WP_Error
 */
function wd_ac_insert_address($args = [])
{
    global $wpdb;

    $defaults = [
        'name' => $args['name'],
        'address' => $args['address'],
        'phone' => $args['phone'],
        'email' => $args['email'],
        'created_by' => get_current_user_id(),
        'created_at' => current_time('mysql')
    ];

    $format = ['%s', '%s', '%s', '%s', '%d', '%s'];

    $data = wp_parse_args($args, $defaults);

    $inserted = $wpdb->insert("{$wpdb->prefix}ac_addresses", $data, $format);

    if (!$inserted) {
        return new \WP_Error('Failed to insert data', 'wedevs-academy');
    }

    return $wpdb->insert_id;
}

/**
 * Fetching data from database
 */
function wd_ac_get_addresses($args = [])
{
    global $wpdb;

    $defaults = [
        'number' => 20,
        'offset' => 0,
        'order_by' => 'id',
        'order' => 'ASC'
    ];

    $args = wp_parse_args($args, $defaults);

    $sql = $wpdb->prepare(
            "SELECT * FROM {$wpdb->prefix}ac_addresses
                ORDER BY {$args['order_by']} {$args['order']}
                LIMIT %d, %d"
           ,$args['offset'],$args['number']
    );

    $items = $wpdb->get_results($sql);

    return $items;
}

/**
 * Get the count of row
 * @return int
 */
function wd_ac_address_count(){
    global $wpdb;
    return (int) $wpdb->get_var("SELECT count(id) FROM {$wpdb->prefix}ac_addresses");
}
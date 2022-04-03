<?php

/**
 * Insert new address
 * @param $args
 * @return int|WP_Error
 */
 function wd_ac_insert_address($args=[]){
     global $wpdb;

     $defaults=[
         'name'=>$args['name'],
         'address'=>$args['address'],
         'phone'=>$args['phone'],
         'email'=>$args['email'],
         'created_by'=>get_current_user_id(),
         'created_at'=>current_time('mysql')
     ];

     $format = ['%s','%s','%s','%s','%d','%s'];

     $data = wp_parse_args($args, $defaults);

     $inserted = $wpdb->insert("{$wpdb->prefix}ac_addresses", $data, $format);

     if(!$inserted){
         return new \WP_Error('Failed to insert data', 'wedevs-academy');
     }

     return $wpdb->insert_id;
 }
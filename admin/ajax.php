<?php
if (!defined('ABSPATH')) exit;

add_action('wp_ajax_maaligodbl_start_backup', function(){

    if (!current_user_can('manage_options')) {
        wp_send_json_error("Unauthorized");
    }

    maaligodbl_run_backup();

    wp_send_json_success();
});

add_action('wp_ajax_maaligodbl_progress', function(){
    wp_send_json_success(get_option('maaligodbl_progress', 0));
});
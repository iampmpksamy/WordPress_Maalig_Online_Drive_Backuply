<?php
if (!defined('ABSPATH')) exit;

add_action('wp_ajax_maaligodbl_start_backup',function(){
    wp_schedule_single_event(time(),'maaligodbl_cron_backup');
    wp_send_json_success();
});

add_action('wp_ajax_maaligodbl_progress',function(){
    wp_send_json_success(get_option('maaligodbl_progress',0));
});
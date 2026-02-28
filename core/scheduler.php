<?php
if (!defined('ABSPATH')) exit;

add_action('maaligodbl_cron_backup','maaligodbl_run_backup');

function maaligodbl_schedule_backup(){
    if(!wp_next_scheduled('maaligodbl_cron_backup')){
        wp_schedule_event(time(),'daily','maaligodbl_cron_backup');
    }
}

register_activation_hook(__FILE__,'maaligodbl_schedule_backup');

function maaligodbl_clear_schedule(){
    wp_clear_scheduled_hook('maaligodbl_cron_backup');
}
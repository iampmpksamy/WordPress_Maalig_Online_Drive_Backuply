<?php
if (!defined('ABSPATH')) exit;

add_action('maaligodbl_cron_hook', 'maaligodbl_run_backup');

function maaligodbl_schedule_backup() {
    if (!wp_next_scheduled('maaligodbl_cron_hook')) {
        wp_schedule_event(time(), 'daily', 'maaligodbl_cron_hook');
    }
}

function maaligodbl_clear_schedule() {
    wp_clear_scheduled_hook('maaligodbl_cron_hook');
}
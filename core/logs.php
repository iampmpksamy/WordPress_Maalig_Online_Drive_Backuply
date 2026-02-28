<?php
if (!defined('ABSPATH')) exit;

function maaliagodbl_add_log($message) {
    if (!file_exists(MAALIGODBL_BACKUP_DIR)) {
        wp_mkdir_p(MAALIGODBL_BACKUP_DIR);
    }

    $log_file = MAALIGODBL_BACKUP_DIR . 'backup-log.txt';
    $date = date('Y-m-d H:i:s');
    file_put_contents($log_file, "[$date] $message\n", FILE_APPEND);
}
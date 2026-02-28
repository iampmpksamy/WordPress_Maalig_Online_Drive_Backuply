<?php
if (!defined('ABSPATH')) exit;

function maaligodbl_run_backup() {

    if (!file_exists(MAALIGODBL_BACKUP_DIR)) {
        wp_mkdir_p(MAALIGODBL_BACKUP_DIR);
    }

    $timestamp = date('Y-m-d_H-i-s');
    $zip_file = MAALIGODBL_BACKUP_DIR . "backup_$timestamp.zip";

    $result = maaligodbl_create_full_backup($zip_file);

    if ($result) {

        maaliagodbl_add_log("Backup Created: $zip_file");

        if (get_option('maaligodbl_email_notify')) {
            wp_mail(
                get_option('admin_email'),
                'Backup Completed',
                'Backup created: ' . $zip_file
            );
        }

        if (get_option('maaligodbl_enable_gdrive')) {
            maaligodbl_upload_to_gdrive($zip_file);
        }

        return true;
    }

    return false;
}
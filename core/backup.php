<?php
if (!defined('ABSPATH')) exit;

function maaligodbl_run_backup(){

    update_option('maaligodbl_progress',0);

    if(!file_exists(MAALIGODBL_BACKUP_DIR)){
        wp_mkdir_p(MAALIGODBL_BACKUP_DIR);
    }

    $timestamp = date('Y-m-d_H-i-s');
    $zip_file = MAALIGODBL_BACKUP_DIR."backup_$timestamp.zip";

    update_option('maaligodbl_progress',20);

    $result = maaligodbl_create_full_backup($zip_file);

    update_option('maaligodbl_progress',60);

    if($result){

        if(get_option('maaligodbl_enable_gdrive')){
            maaligodbl_upload_to_gdrive($zip_file);
        }

        update_option('maaligodbl_progress',90);

        maaligodbl_rotate_backups();

        update_option('maaligodbl_progress',100);

        maaliagodbl_add_log("Backup completed: $zip_file");

        return true;
    }

    return false;
}

function maaligodbl_rotate_backups(){

    $files = glob(MAALIGODBL_BACKUP_DIR.'*.zip');
    rsort($files);

    $keep = 5;

    if(count($files) > $keep){
        for($i=$keep;$i<count($files);$i++){
            unlink($files[$i]);
        }
    }
}
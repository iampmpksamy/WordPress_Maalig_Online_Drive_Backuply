<?php
if (!defined('ABSPATH')) exit;

function maaliagodbl_add_log($msg){
    if(!file_exists(MAALIGODBL_BACKUP_DIR)){
        wp_mkdir_p(MAALIGODBL_BACKUP_DIR);
    }
    file_put_contents(
        MAALIGODBL_BACKUP_DIR.'backup-log.txt',
        "[".date('Y-m-d H:i:s')."] ".$msg."\n",
        FILE_APPEND
    );
}
<?php
class MAALIGODBL_Restore {

    public static function run($file) {

        if (!current_user_can('manage_options')) {
            wp_die('Unauthorized');
        }

        $zip = new ZipArchive();
        if ($zip->open(MAALIGODBL_STORAGE . $file) === TRUE) {
            $zip->extractTo(ABSPATH);
            $zip->close();
        }
    }
}
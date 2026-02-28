<?php
class MAALIGODBL_Scanner {

    public static function scan($dir) {

        $files = [];
        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS)
        );

        foreach ($iterator as $file) {
            if ($file->isFile()) {
                if (strpos($file->getPathname(), 'maalig-backups') === false) {
                    $files[] = $file->getPathname();
                }
            }
        }

        return $files;
    }
}
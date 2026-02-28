<?php
if (!defined('ABSPATH')) exit;

function maaligodbl_create_full_backup($zip_file) {

    $zip = new ZipArchive();

    if ($zip->open($zip_file, ZipArchive::CREATE) !== TRUE) {
        return false;
    }

    $rootPath = ABSPATH;

    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($rootPath, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );

    foreach ($files as $file) {

        $filePath = $file->getRealPath();
        $relativePath = str_replace($rootPath, '', $filePath);

        if ($file->isDir()) {
            $zip->addEmptyDir($relativePath);
        } else {
            $zip->addFile($filePath, $relativePath);
        }
    }

    $sql_dump = maaligodbl_generate_database_dump();
    $zip->addFromString('database.sql', $sql_dump);

    $zip->close();

    return true;
}
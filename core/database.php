<?php
if (!defined('ABSPATH')) exit;

function maaligodbl_generate_database_dump(){

    global $wpdb;
    $tables = $wpdb->get_col("SHOW TABLES");
    $output='';

    foreach($tables as $table){
        $create = $wpdb->get_row("SHOW CREATE TABLE $table",ARRAY_N);
        $output .= "\n".$create[1].";\n";

        $rows = $wpdb->get_results("SELECT * FROM $table",ARRAY_A);
        foreach($rows as $row){
            $vals = array_map(function($v){
                return "'".esc_sql($v)."'";
            },array_values($row));

            $output .= "INSERT INTO `$table` VALUES (".implode(',',$vals).");\n";
        }
    }
    return $output;
}
<?php
if (!defined('ABSPATH')) exit;

add_action('admin_menu', function(){

    add_menu_page(
        'Maalig Backup',
        'Maalig Backup',
        'manage_options',
        'maaligodbl-dashboard',
        'maaligodbl_dashboard_page',
        'dashicons-database'
    );

    add_submenu_page(
        'maaligodbl-dashboard',
        'Settings',
        'Settings',
        'manage_options',
        'maaligodbl-settings',
        'maaligodbl_settings_page'
    );
});

function maaligodbl_dashboard_page(){

    $files = glob(MAALIGODBL_BACKUP_DIR . '*.zip');
?>

<div class="wrap">
<h1>Maalig Backup Dashboard</h1>

<button id="startBackup" class="button button-primary">Run Backup Now</button>

<div style="margin-top:20px;background:#eee;width:400px;height:20px;">
    <div id="progressBar" style="background:#4caf50;width:0%;height:100%;"></div>
</div>

<script>
jQuery(function($){

    $('#startBackup').click(function(){

        $.post(ajaxurl,{action:'maaligodbl_start_backup'},function(){
            checkProgress();
        });

    });

    function checkProgress(){
        $.post(ajaxurl,{action:'maaligodbl_progress'},function(res){
            var p = res.data;
            $('#progressBar').css('width',p+'%');

            if(p < 100){
                setTimeout(checkProgress,1000);
            } else {
                location.reload();
            }
        });
    }

});
</script>

<hr>

<h2>Available Backups</h2>

<?php
if ($files) {
    foreach ($files as $file) {
        $name = basename($file);
        echo "<p><a href='".content_url('maalig-backups/'.$name)."' download>$name</a></p>";
    }
} else {
    echo "<p>No backups found.</p>";
}
?>

</div>

<?php }
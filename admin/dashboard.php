<?php
if (!defined('ABSPATH')) exit;

add_action('admin_menu', function() {

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

function maaligodbl_dashboard_page() {

    $files = file_exists(MAALIGODBL_BACKUP_DIR)
        ? scandir(MAALIGODBL_BACKUP_DIR)
        : [];
?>
<div class="wrap">
<h1>Maalig Backup Dashboard</h1>

<form method="post">
<button type="submit" name="run_backup"
class="button button-primary">Run Backup Now</button>
</form>

<?php
if (isset($_POST['run_backup'])) {
    maaligodbl_run_backup();
    echo "<p><strong>Backup started.</strong></p>";
}
?>

<h2>Available Backups</h2>
<ul>
<?php
foreach ($files as $file) {
    if (strpos($file, '.zip') !== false) {
        echo "<li><a href='" .
        content_url('maalig-backups/' . $file) .
        "' download>$file</a></li>";
    }
}
?>
</ul>

</div>
<?php }
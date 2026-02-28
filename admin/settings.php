<?php
if (!defined('ABSPATH')) exit;

function maaligodbl_settings_page() {

    // Handle Disconnect
    if (isset($_GET['disconnect_gdrive'])) {
        delete_option('maaligodbl_gdrive_token');
        echo "<div class='updated'><p>Disconnected from Google Drive.</p></div>";
    }

    // Save Settings
    if (isset($_POST['maaligodbl_save_settings'])) {

        check_admin_referer('maaligodbl_settings_nonce');

        update_option(
            'maaligodbl_enable_gdrive',
            isset($_POST['maaligodbl_enable_gdrive']) ? 1 : 0
        );

        update_option(
            'maaligodbl_email_notify',
            isset($_POST['maaligodbl_email_notify']) ? 1 : 0
        );

        update_option(
            'maaligodbl_client_id',
            sanitize_text_field($_POST['maaligodbl_client_id'])
        );

        update_option(
            'maaligodbl_client_secret',
            sanitize_text_field($_POST['maaligodbl_client_secret'])
        );

        echo "<div class='updated'><p>Settings saved successfully.</p></div>";
    }

    $authUrl = maaligodbl_get_auth_url();
    $token   = get_option('maaligodbl_gdrive_token');
?>

<div class="wrap">
<h1>Maalig Backup Settings</h1>

<form method="post">

<?php wp_nonce_field('maaligodbl_settings_nonce'); ?>

<table class="form-table">

<tr>
<th>Google Client ID</th>
<td>
<input type="text"
       name="maaligodbl_client_id"
       value="<?php echo esc_attr(get_option('maaligodbl_client_id')); ?>"
       class="regular-text">
</td>
</tr>

<tr>
<th>Google Client Secret</th>
<td>
<input type="text"
       name="maaligodbl_client_secret"
       value="<?php echo esc_attr(get_option('maaligodbl_client_secret')); ?>"
       class="regular-text">
</td>
</tr>

<tr>
<th>Enable Google Drive Upload</th>
<td>
<input type="checkbox"
       name="maaligodbl_enable_gdrive"
       value="1"
<?php checked(get_option('maaligodbl_enable_gdrive'), 1); ?>>
</td>
</tr>

<tr>
<th>Email Notification</th>
<td>
<input type="checkbox"
       name="maaligodbl_email_notify"
       value="1"
<?php checked(get_option('maaligodbl_email_notify'), 1); ?>>
</td>
</tr>

<tr>
<th>Google Drive Status</th>
<td>

<?php if ($token && isset($token['access_token'])): ?>

<span style="color:green;font-weight:bold;">Connected ✓</span><br><br>

<a href="<?php echo esc_url(add_query_arg('disconnect_gdrive','1')); ?>"
   class="button">
   Disconnect
</a>

<?php else: ?>

<a href="<?php echo esc_url($authUrl); ?>"
   class="button button-primary">
   Connect Google Drive
</a>

<?php endif; ?>

</td>
</tr>

</table>

<p>
<input type="submit"
       name="maaligodbl_save_settings"
       class="button button-primary"
       value="Save Settings">
</p>

</form>

<hr>

<h2>Google Drive Storage</h2>

<?php
if ($token && isset($token['access_token'])) {

    $quota = maaligodbl_get_drive_quota();

    if ($quota && isset($quota['storageQuota'])) {

        $used  = $quota['storageQuota']['usage'];
        $total = $quota['storageQuota']['limit'];

        $used_gb  = round($used / 1024 / 1024 / 1024, 2);
        $total_gb = round($total / 1024 / 1024 / 1024, 2);

        echo "<p><strong>Used:</strong> {$used_gb} GB / {$total_gb} GB</p>";

    } else {
        echo "<p>Unable to fetch quota information.</p>";
    }

} else {
    echo "<p>Connect Google Drive to view storage quota.</p>";
}
?>

</div>

<?php
}
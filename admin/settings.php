<?php
if (!defined('ABSPATH')) exit;

function maaligodbl_settings_page() {

    if (isset($_POST['maaligodbl_save_settings'])) {

        update_option('maaligodbl_enable_gdrive',
            isset($_POST['maaligodbl_enable_gdrive']) ? 1 : 0);

        update_option('maaligodbl_email_notify',
            isset($_POST['maaligodbl_email_notify']) ? 1 : 0);

        update_option('maaligodbl_client_id',
            sanitize_text_field($_POST['maaligodbl_client_id']));

        update_option('maaligodbl_client_secret',
            sanitize_text_field($_POST['maaligodbl_client_secret']));

        echo "<div class='updated'><p>Settings saved.</p></div>";
    }

    $authUrl = maaligodbl_get_auth_url();
?>
<div class="wrap">
<h1>Maalig Backup Settings</h1>

<form method="post">
<table class="form-table">

<tr>
<th>Google Client ID</th>
<td><input type="text" name="maaligodbl_client_id"
value="<?php echo esc_attr(get_option('maaligodbl_client_id')); ?>"
class="regular-text"></td>
</tr>

<tr>
<th>Google Client Secret</th>
<td><input type="text" name="maaligodbl_client_secret"
value="<?php echo esc_attr(get_option('maaligodbl_client_secret')); ?>"
class="regular-text"></td>
</tr>

<tr>
<th>Enable Google Drive Upload</th>
<td><input type="checkbox" name="maaligodbl_enable_gdrive"
<?php checked(get_option('maaligodbl_enable_gdrive'), 1); ?> value="1"></td>
</tr>

<tr>
<th>Email Notification</th>
<td><input type="checkbox" name="maaligodbl_email_notify"
<?php checked(get_option('maaligodbl_email_notify'), 1); ?> value="1"></td>
</tr>

<tr>
<th>Connect Google Drive</th>
<td><a href="<?php echo esc_url($authUrl); ?>"
class="button button-primary">Connect Google Drive</a></td>
</tr>

</table>

<p><input type="submit" name="maaligodbl_save_settings"
class="button button-primary" value="Save Settings"></p>
</form>
</div>
<?php }
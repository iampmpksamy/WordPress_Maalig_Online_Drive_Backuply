<?php
if (!defined('ABSPATH')) exit;

function maaligodbl_get_auth_url(){

    return "https://accounts.google.com/o/oauth2/v2/auth?" .
        http_build_query([
            'client_id' => get_option('maaligodbl_client_id'),
            'redirect_uri' => admin_url('admin.php?page=maaligodbl-settings'),
            'response_type' => 'code',
            'scope' => 'https://www.googleapis.com/auth/drive',
            'access_type' => 'offline',
            'prompt' => 'consent'
        ]);
}

add_action('admin_init','maaligodbl_handle_oauth');

function maaligodbl_handle_oauth(){

    if (!isset($_GET['code'])) return;

    $response = wp_remote_post(
        'https://oauth2.googleapis.com/token',
        [
            'body' => [
                'code' => $_GET['code'],
                'client_id' => get_option('maaligodbl_client_id'),
                'client_secret' => get_option('maaligodbl_client_secret'),
                'redirect_uri' => admin_url('admin.php?page=maaligodbl-settings'),
                'grant_type' => 'authorization_code'
            ]
        ]
    );

    $body = json_decode(wp_remote_retrieve_body($response), true);

    if (isset($body['access_token'])) {
        update_option('maaligodbl_gdrive_token', $body);
    }
}

function maaligodbl_get_drive_quota(){

    $token = get_option('maaligodbl_gdrive_token');

    if (!$token || empty($token['access_token'])) {
        return false;
    }

    $response = wp_remote_get(
        'https://www.googleapis.com/drive/v3/about?fields=storageQuota',
        [
            'headers' => [
                'Authorization' => 'Bearer ' . $token['access_token']
            ]
        ]
    );

    if (is_wp_error($response)) {
        maaliagodbl_add_log("Quota fetch error: ".$response->get_error_message());
        return false;
    }

    return json_decode(wp_remote_retrieve_body($response), true);
}
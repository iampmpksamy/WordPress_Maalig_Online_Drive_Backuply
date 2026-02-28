<?php
if (!defined('ABSPATH')) exit;

function maaligodbl_get_redirect_uri() {
    return admin_url('admin.php?page=maaligodbl-settings');
}

function maaligodbl_get_auth_url() {

    $params = [
        'client_id'     => get_option('maaligodbl_client_id'),
        'redirect_uri'  => maaligodbl_get_redirect_uri(),
        'response_type' => 'code',
        'scope'         => 'https://www.googleapis.com/auth/drive.file',
        'access_type'   => 'offline',
        'prompt'        => 'consent'
    ];

    return 'https://accounts.google.com/o/oauth2/v2/auth?' . http_build_query($params);
}

function maaligodbl_handle_oauth_callback() {

    if (!isset($_GET['code'])) return;

    $response = wp_remote_post('https://oauth2.googleapis.com/token', [
        'body' => [
            'code'          => $_GET['code'],
            'client_id'     => get_option('maaligodbl_client_id'),
            'client_secret' => get_option('maaligodbl_client_secret'),
            'redirect_uri'  => maaligodbl_get_redirect_uri(),
            'grant_type'    => 'authorization_code'
        ]
    ]);

    $body = json_decode(wp_remote_retrieve_body($response), true);

    if (isset($body['access_token'])) {
        update_option('maaligodbl_gdrive_token', $body);
    }
}
add_action('admin_init', 'maaligodbl_handle_oauth_callback');

function maaligodbl_upload_to_gdrive($file_path) {

    $token = get_option('maaligodbl_gdrive_token');
    if (!$token) return;

    $access_token = $token['access_token'];

    $response = wp_remote_post(
        'https://www.googleapis.com/upload/drive/v3/files?uploadType=media',
        [
            'headers' => [
                'Authorization' => 'Bearer ' . $access_token,
                'Content-Type'  => 'application/zip'
            ],
            'body' => file_get_contents($file_path)
        ]
    );

    if (wp_remote_retrieve_response_code($response) == 401) {
        // token expired - ignore silently
    }
}
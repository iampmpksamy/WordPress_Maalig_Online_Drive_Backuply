<?php
if (!defined('ABSPATH')) exit;

function maaligodbl_get_redirect_uri(){
    return admin_url('admin.php?page=maaligodbl-settings');
}

function maaligodbl_get_auth_url(){

    return "https://accounts.google.com/o/oauth2/v2/auth?".
        http_build_query([
            'client_id'=>get_option('maaligodbl_client_id'),
            'redirect_uri'=>maaligodbl_get_redirect_uri(),
            'response_type'=>'code',
            'scope'=>'https://www.googleapis.com/auth/drive',
            'access_type'=>'offline',
            'prompt'=>'consent'
        ]);
}

add_action('admin_init','maaligodbl_handle_oauth');

function maaligodbl_handle_oauth(){

    if(!isset($_GET['code'])) return;

    $res = wp_remote_post('https://oauth2.googleapis.com/token',[
        'body'=>[
            'code'=>$_GET['code'],
            'client_id'=>get_option('maaligodbl_client_id'),
            'client_secret'=>get_option('maaligodbl_client_secret'),
            'redirect_uri'=>maaligodbl_get_redirect_uri(),
            'grant_type'=>'authorization_code'
        ]
    ]);

    $body = json_decode(wp_remote_retrieve_body($res),true);

    if(isset($body['access_token'])){
        update_option('maaligodbl_gdrive_token',$body);
    }
}

function maaligodbl_upload_to_gdrive($file_path){

    $token = get_option('maaligodbl_gdrive_token');
    if(!$token) return;

    $access = $token['access_token'];

    $folder = maaligodbl_get_or_create_folder($access);

    $name = basename($file_path);

    wp_remote_post(
        'https://www.googleapis.com/upload/drive/v3/files?uploadType=media',
        [
            'headers'=>[
                'Authorization'=>'Bearer '.$access,
                'Content-Type'=>'application/zip'
            ],
            'body'=>file_get_contents($file_path)
        ]
    );
}

function maaligodbl_get_drive_quota(){

    $token = get_option('maaligodbl_gdrive_token');
    if(!$token) return false;

    $res = wp_remote_get(
        'https://www.googleapis.com/drive/v3/about?fields=storageQuota',
        ['headers'=>['Authorization'=>'Bearer '.$token['access_token']]]
    );

    return json_decode(wp_remote_retrieve_body($res),true);
}
function maaligodbl_upload_to_gdrive($file_path){

    $token = get_option('maaligodbl_gdrive_token');

    if (!$token || empty($token['access_token'])) {
        maaliagodbl_add_log("Drive Upload skipped: No token.");
        return;
    }

    $access = $token['access_token'];

    $file_name = basename($file_path);

    $metadata = json_encode([
        'name' => $file_name
    ]);

    $boundary = wp_generate_password(24,false);

    $body  = "--$boundary\r\n";
    $body .= "Content-Type: application/json; charset=UTF-8\r\n\r\n";
    $body .= $metadata . "\r\n";
    $body .= "--$boundary\r\n";
    $body .= "Content-Type: application/zip\r\n\r\n";
    $body .= file_get_contents($file_path) . "\r\n";
    $body .= "--$boundary--";

    $response = wp_remote_post(
        'https://www.googleapis.com/upload/drive/v3/files?uploadType=multipart',
        [
            'headers' => [
                'Authorization' => 'Bearer ' . $access,
                'Content-Type'  => 'multipart/related; boundary=' . $boundary
            ],
            'body'    => $body,
            'timeout' => 120
        ]
    );

    if (is_wp_error($response)) {
        maaliagodbl_add_log("Drive Upload Error: ".$response->get_error_message());
        return;
    }

    $code = wp_remote_retrieve_response_code($response);

    if ($code != 200) {
        maaliagodbl_add_log("Drive Upload Failed (Code $code):");
        maaliagodbl_add_log(wp_remote_retrieve_body($response));
    } else {
        maaliagodbl_add_log("Drive Upload Success: $file_name");
    }
}
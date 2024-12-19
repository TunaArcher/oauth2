<?php
require 'vendor/autoload.php';
$config = require 'oauth_config.php';

use GuzzleHttp\Client;

// ตรวจสอบว่ามี code และ state หรือไม่
if (!isset($_GET['code'])) {
    die('Authorization code not found.');
}

$authCode = $_GET['code'];

try {
    $client = new Client();

    // แลกเปลี่ยน Authorization Code เป็น Access Token
    $response = $client->post($config['token_url'], [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'code' => $authCode,
            'redirect_uri' => $config['redirect_uri'],
            'client_id' => $config['client_id'],
            'client_secret' => $config['client_secret'],
        ],
    ]);

    $data = json_decode($response->getBody(), true);

    // บันทึก Access Token ลงฐานข้อมูล
    $accessToken = $data['access_token'];
    $refreshToken = $data['refresh_token'];
    $expiresIn = $data['expires_in'];

    file_put_contents('tokens.json', json_encode($data)); // บันทึกเป็นไฟล์

    echo "Access Token: $accessToken";
} catch (\Exception $e) {
    die('Error retrieving access token: ' . $e->getMessage());
}

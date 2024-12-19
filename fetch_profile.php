<?php
require 'vendor/autoload.php';
$config = require 'oauth_config.php';

use GuzzleHttp\Client;

// ดึง Access Token จากไฟล์
$data = json_decode(file_get_contents('tokens.json'), true);
$accessToken = $data['access_token'];

try {
    $client = new Client();

    // เรียก API ดึงข้อมูลโปรไฟล์
    $response = $client->get($config['api_url'] . 'user/profile', [
        'headers' => [
            'Authorization' => 'Bearer ' . $accessToken,
        ],
    ]);

    $profile = json_decode($response->getBody(), true);

    echo "User ID: " . $profile['id'] . "<br>";
    echo "Name: " . $profile['name'] . "<br>";
    echo "Email: " . $profile['email'] . "<br>";
} catch (\Exception $e) {
    die('Error fetching profile: ' . $e->getMessage());
}

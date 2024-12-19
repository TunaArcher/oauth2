<?php
$config = require 'oauth_config.php';

// สร้าง URL สำหรับ Authorization Request
$authUrl = $config['auth_url'] . '?' . http_build_query([
    'response_type' => 'code',
    'client_id' => $config['client_id'],
    'redirect_uri' => $config['redirect_uri'],
    'scope' => 'read_profile read_messages', // ระบุ scope ที่ต้องการ
    'state' => 'random_generated_state',     // ใช้สำหรับป้องกัน CSRF
]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connect Account</title>
</head>
<body>
    <h1>Connect Your Account</h1>
    <a href="<?= $authUrl ?>">Connect with Platform</a>
</body>
</html>

<?php
return [
    'client_id' => 'YOUR_CLIENT_ID',          // Client ID จากแพลตฟอร์ม
    'client_secret' => 'YOUR_CLIENT_SECRET',  // Client Secret
    'redirect_uri' => 'https://yourdomain.com/callback.php', // URL สำหรับรับ Authorization Code
    'auth_url' => 'https://platform.com/oauth/authorize',    // URL สำหรับให้ผู้ใช้อนุมัติ
    'token_url' => 'https://platform.com/oauth/token',       // URL สำหรับแลกเปลี่ยน Access Token
    'api_url' => 'https://platform.com/api/',                // Base URL ของ API
];

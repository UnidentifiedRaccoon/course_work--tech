<?php
function generateToken($userId) {
    $secretKey = 'secret_key'; // Change this to a secure secret key
    $tokenData = [
        'user_id' => $userId,
        'expiration' => time() + (60 * 60), // Token expiration time (e.g., 1 hour from now)
    ];

    $token = base64_encode(json_encode($tokenData));
    $signature = hash_hmac('sha256', $token, $secretKey, true);

    return $token . '.' . base64_encode($signature);
}


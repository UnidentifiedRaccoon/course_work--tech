<?php
    $token = $_COOKIE['authToken'];
    $secretKey = 'secret_key';
    list($tokenData, $signature) = explode('.', $token);

    $decodedTokenData = json_decode(base64_decode($tokenData), true);
    $generatedSignature = hash_hmac('sha256', $tokenData, $secretKey, true);

    if ($decodedTokenData['expiration'] < time()) {
        setcookie('authToken', '', time() - 3600, "/");
        header("Location: ../pages/main.php");
        exit();
    }

    if (hash_equals($generatedSignature, base64_decode($signature))) {
    } else {
        echo "Невалидный authToken";
        setcookie('authToken', '', time() - 3600, "/");
        exit();
    }
?>
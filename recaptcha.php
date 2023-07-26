<?php

$dataSiteKey = "6Lc0n40mAAAAAECs8_IY2TpqCPNNa57PBcC4A1qV";
function processRecaptcha($responseToken): string
{
    $captcha = $responseToken;

    if (!$captcha) {
        return "Please check the the captcha form.";
    }

    $secretKey = "6Lc0n40mAAAAAMAoPr9sAsv_hL15Mg5IEtdazucZ";
    $ip = $_SERVER['REMOTE_ADDR'];
    // post request to server
    $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) . '&response=' . urlencode($captcha);
    $response = file_get_contents($url);
    $responseKeys = json_decode($response, true);

    // should return JSON with success as true
    if (!$responseKeys["success"]) {
        return "reCaptcha verification failed.";
    }else {
        return "";
    }
}

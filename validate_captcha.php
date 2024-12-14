<?php
session_start();

$response = ['success' => false];
if (isset($_POST['captcha'])) {
    $userCaptcha = strtoupper(trim($_POST['captcha']));
    if (isset($_SESSION['captcha']) && $userCaptcha === $_SESSION['captcha']) {
        $response['success'] = true;
    }
}

echo json_encode($response);
?>

<?php
session_start();

// 3.1 生成验证码文字
$captchaText = substr(str_shuffle('ABCDEFGHJKLMNPQRSTUVWXYZ23456789'), 0, 6);

// 3.3 将验证码存储到Session中
$_SESSION['captcha'] = $captchaText;

// 3.2 创建图像并绘制验证码文字
$width = 120;
$height = 50;
$image = imagecreate($width, $height);
$bgColor = imagecolorallocate($image, 255, 255, 255);
$textColor = imagecolorallocate($image, 0, 0, 0);
$lineColor = imagecolorallocate($image, 64, 64, 64);
$dotColor = imagecolorallocate($image, 100, 100, 100);



// 绘制干扰线
for ($i = 0; $i < 5; $i++) {
    imageline($image, rand(0, $width), rand(0, $height), rand(0, $width), rand(0, $height), $lineColor);
}

// 绘制干扰点
for ($i = 0; $i < 50; $i++) {
    imagesetpixel($image, rand(0, $width), rand(0, $height), $dotColor);
}

// 添加文字
error_reporting(E_ALL);
imagettftext($image, 20, rand(-10, 10), rand(10, 40), rand(30, 40), $textColor, 'D:\phpstudy_pro\WWW\apartment\ttf\arial.ttf', $captchaText);
ini_set('display_errors', 1);

// 输出图像
ob_clean();
header('Content-Type: image/png');
imagepng($image);
imagedestroy($image);
?>


<?php
session_start();
header("Content-type: text/html; charset=utf-8");

// 检查是否设置了用户名、密码和邮箱
$username = isset($_POST["username"]) ? $_POST["username"] : '';
$password = isset($_POST["password"]) ? $_POST["password"] : '';
$email = isset($_POST["email"]) ? $_POST["email"] : '';

// 检查头像文件是否上传
if (!isset($_FILES["avatar"]) || $_FILES["avatar"]["error"] != 0) {
    echo "<script>alert('请上传头像！'); history.go(-1);</script>";
    exit();
}

// 检查用户名或密码是否为空
if ($username == '' || $password == '') {
    echo "<script>alert('请确认信息完整性！'); history.go(-1);</script>";
    exit();
}

// 数据库连接信息
$servername = "localhost";
$adminuser = "root";
$adminpsw = "123456";
$dbname = "user_profile_db";

// 创建连接
$conn = new mysqli($servername, $adminuser, $adminpsw, $dbname);

// 检查连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 设置数据库字符集
$conn->set_charset("utf8");

// 防止SQL注入，检查用户名是否已存在
$sql = "SELECT username FROM user WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$num = $result->num_rows;

if ($num > 0) {
    echo "<script>alert('用户名已存在！'); history.go(-1);</script>";
    exit();
}

// 头像上传处理
$uploadDir = "avatar/"; // 指定存储路径
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true); // 如果目录不存在，创建目录
}

// 生成唯一的文件名
$avatarFileName = uniqid("avatar_") . "." . pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
$targetFilePath = $uploadDir . $avatarFileName;

// 检查文件类型和大小
$allowedTypes = ["image/jpeg", "image/png", "image/gif"];
if (!in_array($_FILES["avatar"]["type"], $allowedTypes)) {
    echo "<script>alert('仅支持 JPG、PNG 和 GIF 格式的图片！'); history.go(-1);</script>";
    exit();
}
if ($_FILES["avatar"]["size"] > 5 * 1024 * 1024) { // 限制文件大小为 5MB
    echo "<script>alert('图片大小不能超过 5MB！'); history.go(-1);</script>";
    exit();
}

// 移动上传的文件到目标路径
if (!move_uploaded_file($_FILES["avatar"]["tmp_name"], $targetFilePath)) {
    echo "<script>alert('头像上传失败，请重试！'); history.go(-1);</script>";
    exit();
}

// 注册新用户，保存头像路径到数据库
$sql_insert = "INSERT INTO user (username, password, email, avatar) VALUES (?, ?, ?, ?)";
$stmt_insert = $conn->prepare($sql_insert);
$stmt_insert->bind_param("ssss", $username, $password, $email, $targetFilePath);
if ($stmt_insert->execute()) {
    echo "<script>alert('注册成功！'); window.location='login.php';</script>";
} else {
    echo "<script>alert('系统繁忙请重试！'); history.go(-1);</script>";
}

// 关闭数据库连接
$stmt_insert->close();
$conn->close();
?>

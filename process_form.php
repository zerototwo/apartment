<?php
// 数据库连接配置
$host = "localhost";
$username = "root";
$password = "Qwerty@12345";
$database = "apartment";

// 创建数据库连接
$conn = new mysqli($host, $username, $password, $database);

// 检查连接是否成功
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 检查是否接收到 POST 请求
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']); // 处理输入，防止 XSS
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // 插入数据到数据库
    $sql = "INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    if ($stmt->execute()) {
        echo "Your message has been submitted successfully!";
    } else {
        echo "Error submitting message: " . $conn->error;
    }

    $stmt->close();
}

// 关闭数据库连接
$conn->close();
?>

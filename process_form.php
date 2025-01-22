<?php
// 数据库配置
$servername = "localhost";
$username = "root";
$password = "Qwerty@12345";
$dbname = "apartment";

try {
    // 连接到数据库
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 检查是否接收到表单提交的数据
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']); // 处理输入，防止 XSS
        $email = htmlspecialchars($_POST['email']);
        $subject = htmlspecialchars($_POST['subject']);
        $message = htmlspecialchars($_POST['message']);

        // 插入数据到数据库
        $sql = "INSERT INTO contact_messages (name, email, subject, message) VALUES (:name, :email, :subject, :message)";
        $stmt = $conn->prepare($sql);

        // 绑定参数
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':subject', $subject);
        $stmt->bindParam(':message', $message);

        // 执行插入
        $stmt->execute();

        // 提交成功后重定向或显示成功消息
        echo "Your message has been submitted successfully!";
    }
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
}
?>

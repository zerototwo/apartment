<?php
// 数据库连接配置
$host = "localhost";
$username = "root";
$password = "Qwerty@12345";
$database = "rental_management";

// 创建数据库连接
$conn = new mysqli($host, $username, $password, $database);

// 检查连接是否成功
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 检查是否接收到 POST 请求
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 获取要删除的记录 ID
    $id = intval($_POST['id']);

    // 删除数据库中对应的记录
    $sql = "DELETE FROM properties WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Property deleted successfully!";
    } else {
        echo "Error deleting property: " . $conn->error;
    }

    $stmt->close();
}

// 关闭数据库连接
$conn->close();

// 重定向回主页面
header("Location: property_list.php");
exit;
?>

<?php
// 数据库连接配置
$host = "localhost";
$username = "root"; // 数据库用户名
$password = "Qwerty@12345"; // 数据库密码
$database = "apartment"; // 数据库名称

// 创建数据库连接
$conn = new mysqli($host, $username, $password, $database);

// 检查连接是否成功
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 检查是否接收到要删除的用户 ID
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    // 获取用户 ID
    $user_id = intval($_POST['id']); // 转换为整数，避免 SQL 注入

    if (!$user_id) {
        die("Invalid user ID."); // 防止空或无效的 ID
    }

    // 删除用户的 SQL 语句
    $sql = "DELETE FROM users WHERE id = ?";

    // 开始事务处理
    $conn->autocommit(FALSE);

    // 准备语句
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        // 绑定参数
        $stmt->bind_param("i", $user_id);

        // 执行语句
        if ($stmt->execute()) {
            $conn->commit(); // 提交事务
            header("Location: user_management.php?message=User deleted successfully");
            exit();
        } else {
            $conn->rollback(); // 回滚事务
            echo "Error deleting user: " . $stmt->error;
        }

        // 关闭语句
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
} else {
    echo "Invalid request. Please try again.";
}

// 关闭数据库连接
$conn->close();
?>

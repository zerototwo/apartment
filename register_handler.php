<?php
session_start();
header("Content-type: text/html; charset=utf-8"); // 处理数据库用户名乱码
 
// 检查是否设置了用户名和密码
$username = isset($_POST["username"]) ? $_POST["username"] : '';
$password = isset($_POST["password"]) ? $_POST["password"] : '';
$email = isset($_POST["email"]) ? $_POST["email"] : '';
 
if ($username == '' || $password == '') {
    echo "<script>alert('请确认信息完整性！'); history.go(-1);</script>";  
} else {
    // 数据库连接信息
    $servername = "localhost";
    $adminuser = "admin";
    $adminpsw = "123456";
    $dbname = "apt";
 
    // 创建连接
    $conn = new mysqli($servername, $adminuser, $adminpsw, $dbname);
 
    // 检查连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    }
 
    // 设置数据库字符集
    $conn->set_charset("utf8");
 
    // 防止SQL注入
    $sql = "SELECT username FROM user WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $num = $result->num_rows;
 
    if ($num > 0) {
        echo "<script>alert('用户名已存在！'); history.go(-1);</script>";  
    } else {
        // 注册新用户
        $sql_insert = "INSERT INTO user (username, password,email) VALUES (?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("sss", $username, $password,$email);
        if ($stmt_insert->execute()) {
            echo "<script>alert('注册成功！');window.location='login.php';</script>";  
        } else {
            echo "<script>alert('系统繁忙请重试！'); history.go(-1);</script>";  
        }
    }
}
?>
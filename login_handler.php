<?php
session_start();

$username = $_POST["username"];
$password = $_POST["password"];

if (empty($username) || empty($password)) {
    echo "<script>alert('请输入用户名或密码！'); history.go(-1);</script>";
} else {
    // 连接数据库
    $link = mysqli_connect("localhost", "admin", "123456", "apt");
    if (!$link) {
        die("<script>alert('数据库连接失败！'); history.go(-1);</script>");
    }

    mysqli_query($link, "set names utf8");

    // 防止 SQL 注入，使用参数化查询
    $stmt = mysqli_prepare($link, "SELECT Iduser, username FROM user WHERE username = ? AND password = ?");
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // 检查是否有匹配的记录
    if ($row = mysqli_fetch_assoc($result)) {
        // 登录成功，设置会话变量
        $_SESSION['user_Iduser'] = $row['Iduser']; // 保存用户的唯一 ID
        $_SESSION['username'] = $row['username']; // 可选，保存用户名
        $_SESSION['userType'] = $row['userType'];

        // 跳转到主页
        echo "<script>alert('登录成功！'); window.location='index.php';</script>";
    } else {
        // 登录失败
        echo "<script>alert('用户名或密码不正确！'); history.go(-1);</script>";
    }

    // 关闭数据库连接
    mysqli_stmt_close($stmt);
    mysqli_close($link);
}
?>

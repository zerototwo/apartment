<?php
$dsn="mysql:host=localhost;dbname=APT";
$username="root";
$passwd="123456";
 
try {
	$pdo=new PDO($dsn,$username,$passwd);//数据源:代表连接那种数据库，数据库是什么。数据库管理工具的账号+密码
    // 设置错误模式为异常
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "成功连接到数据库";
} catch (PDOException $e) {
    echo "连接数据库失败: " . $e->getMessage();
}
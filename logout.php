<?php
session_start();
session_unset();
session_destroy();
header("Location: index.php"); // 登出后跳转到登录页面
exit();
?>

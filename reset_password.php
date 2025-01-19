<?php
session_start();
require_once 'db.php'; // 数据库连接文件

$step = 1; // 当前步骤，默认显示输入用户名和邮箱
$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username'], $_POST['email'])) {
        // 验证用户名和邮箱
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);

        // 查询数据库
        $stmt = $pdo->prepare("SELECT * FROM user WHERE username = ? AND email = ?");
        $stmt->execute([$username, $email]);
        $user = $stmt->fetch();

        if ($user) {
            $_SESSION['reset_user_Iduser'] = $user['Iduser'];
            $_SESSION['reset_username'] = $username;
            $step = 2; // 进入重设密码步骤
        } else {
            $error = "The username and email do not match any account.";
        }
    } elseif (isset($_POST['new_password'])) {
        // 重设密码
        if (!isset($_SESSION['reset_user_Iduser'])) {
            header("Location: reset_password.php");
            exit();
        }

        $new_password = trim($_POST['new_password']);
        $user_Iduser = $_SESSION['reset_user_Iduser'];

        // 更新密码到数据库
        $stmt = $pdo->prepare("UPDATE user SET password = ? WHERE Iduser = ?");
        $stmt->execute([$new_password, $user_Iduser]);

        // 清除 Session
        unset($_SESSION['reset_user_Iduser'], $_SESSION['reset_username']);
        $success = "Your password has been successfully reset. You can now log in.";
        $step = 3;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
</head>
<body>
<div class="form-container">
    <h1>Reset Password</h1>

    <?php if ($error): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

    <?php if ($success): ?>
        <p class="success"><?php echo $success; ?></p>
        <a href="login.php" class="btn">Go to Login</a>
    <?php elseif ($step == 1): ?>
        <form method="POST" action="reset_password.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <button type="submit" class="btn">Verify</button>
            <a href="login.php" class="link">Back to login</a>
        </form>
    <?php elseif ($step == 2): ?>
        <form method="POST" action="reset_password.php">
            <p>Hello, <?php echo htmlspecialchars($_SESSION['reset_username']); ?>, please enter your new password.</p>
            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password" required>

            <button type="submit" class="btn">Reset Password</button>
            <a href="login.php" class="link">Back to login</a>
        </form>
    <?php endif; ?>
</div>
</body>
</html>


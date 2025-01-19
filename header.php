<?php
session_start();
require_once 'conn.php'; // 数据库连接文件
$conn = db_connect();

// 检查用户是否已登录
$isLoggedIn = isset($_SESSION['user_Iduser']);
$userData = [];

if ($isLoggedIn) {
    // 从数据库获取用户信息
    $userId = $_SESSION['user_Iduser'];
    $stmt = $conn->prepare("SELECT username, avatar, userType FROM user WHERE Iduser = ?");
    $stmt->execute([$userId]);
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$userData) {
        // 如果查询失败，注销用户登录状态
        $isLoggedIn = false;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Housing Management</title>
    <link rel="stylesheet" href="css/styleindex.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
</head>

<header>
    <!-- Logo -->
    <div class="logo">
        <img src="pics/logo.png" alt="Company Logo">
    </div>

    <!-- 导航菜单 -->
    <nav>
        <ul class="nav-menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Apartment</a></li>
            <li><a href="favorite.php">My Intention</a></li>
            <li><a href="addiservice.php">Additional Service</a></li>
            <li><a href="reset_password.php">Help</a></li>
            <?php if ($isLoggedIn && !empty($userData)): ?>
                <li>
                    <div class="user-info">
                        <img src="<?php echo htmlspecialchars($userData['avatar']); ?>" alt="Avatar" class="avatar">
                        <a href="<?php
                        // 根据 userType 设置跳转链接
                        echo $userData['userType'] === 'tenant' ? 'profile.php' : 'ownerpage.php';
                        ?>">
                            <?php echo htmlspecialchars($userData['username']); ?>
                        </a>
                    </div>
                </li>
            <?php else: ?>
                <li><a href="login.php">Log in</a></li>
                <li><a href="register.php">Sign up</a></li>
            <?php endif; ?>

        </ul>

        <!-- 汉堡菜单按钮 -->
        <div class="burger">
            <div class="top-line"></div>
            <div class="middle-line"></div>
            <div class="bottom-line"></div>
        </div>
    </nav>
</header>

<!-- 内嵌 JavaScript -->
<script>
    // 获取汉堡按钮和导航菜单
    const burger = document.querySelector(".burger");
    const navMenu = document.querySelector(".nav-menu");

    // 点击汉堡按钮时切换菜单状态
    burger.addEventListener("click", () => {
        burger.classList.toggle("active");
        navMenu.classList.toggle("open");
    });

    // 监听窗口大小变化，确保大屏幕时导航栏正常显示
    window.addEventListener("resize", () => {
        if (window.innerWidth > 768) {
            navMenu.classList.remove("open");
        }
    });
</script>

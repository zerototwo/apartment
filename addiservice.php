<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extra Services</title>
    <link rel="stylesheet" href="css/addi.css">
</head>
<body>
<!--<header>-->
<!--    <div class="logo">Apartment Management System</div>-->
<!--    <nav>-->
<!--        <ul>-->
<!--            <li><a href="index.php">Home</a></li>-->
<!--            <li><a href="services.php" class="active">Extra Services</a></li>-->
<!--            <li><a href="contact.php">Contact</a></li>-->
<!--            <li><a href="profile.php">Profile</a></li>-->
<!--        </ul>-->
<!--    </nav>-->
<!--</header>-->

<header>
    <div class="logo">
        <img src="pics/logo.png" alt="Company Logo">
    </div>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Apartment</a></li>
            <li><a href="#">My Intention</a></li>
            <li><a href="#">Additional Service</a></li>
            <!--            <li><a href="login.php">Log in</a></li>-->
            <!--            <li><a href="register.php">Sign up</a></li>-->
            <a href="login.php" class="btn">Log in</a>
            <a href="register.php" class="btn">Sign up</a>

            <li><a href="#">Help</a></li>
        </ul>
    </nav>
</header>

<!-- 主内容 -->
<main>
    <!-- 标题 -->
    <h1>Additional Service</h1>

    <div class="services-container">
        <!-- 第一行：奖学金服务 -->
        <div class="service-block">
            <a href="scholarship_simulator.php">
                <img src="icons/ic5.png" alt="Scholarship Simulator">
                <p>Scholarship simulator</p>
            </a>
        </div>
        <div class="service-block">
            <a href="scholarship_application.php">
                <img src="icons/ic6.png" alt="Scholarship Application">
                <p>Scholarship application (DSE)</p>
            </a>
        </div>
        <div class="service-block">
            <a href="tracking_application.php">
                <img src="icons/ic7.png" alt="Tracking Application">
                <p>Scholarship tracking application (DSE)</p>
            </a>
        </div>
        <div class="service-block">
            <a href="student_guide.php">
                <img src="icons/ic8.png" alt="Student Guide">
                <p>Student guide</p>
            </a>
        </div>

        <!-- 第二行：住宿相关 -->
        <div class="service-block">
            <a href="crous_residency.php">
                <img src="icons/ic1.png" alt="In Crous Halls">
                <p>In Crous Halls of residency</p>
            </a>
        </div>
        <div class="service-block">
            <a href="paris_saclay.php">
                <img src="icons/ic2.png" alt="Paris-Saclay Campus">
                <p>Paris-Saclay Campus</p>
            </a>
        </div>
        <div class="service-block">
            <a href="private_home.php">
                <img src="icons/ic3.png" alt="Private Home">
                <p>At a private home</p>
            </a>
        </div>
        <div class="service-block">
            <a href="visale.php">
                <img src="icons/ic4.png" alt="Visale">
                <p>Visale your guarantor</p>
            </a>
        </div>

        <!-- 第三行：工作和吃饭 -->
        <div class="service-block">
            <a href="student_job.php">
                <img src="icons/ic9.png" alt="Student Job">
                <p>Find a student job</p>
            </a>
        </div>
        <div class="service-block">
            <a href="restaurant.php">
                <img src="icons/ic12.png" alt="Restaurant">
                <p>Find a restaurant or a residence</p>
            </a>
        </div>
    </div>

    <!-- 右侧信息区 -->
    <aside>
        <div class="info-box">
            <h2>CVEC - Contribution of Student Life</h2>
            <p>Each student in initial training must pay CVEC...</p>
            <a href="https://etudiant.gouv.fr">To find out more</a>
        </div>
        <div class="info-box">
            <h2>Phishing Alert</h2>
            <p>Never give your login credentials...<br>Crous does not need your password.</p>
        </div>
        <div class="info-box">
            <h2>Securing Your Account</h2>
            <p>Update your cell phone number to secure your account.</p>
        </div>
    </aside>
</main>

<!-- 页脚 -->
<footer>
<!--    <p>&copy; 2024 Apartment Management System | All rights reserved.</p>-->

    <footer>
        <ul class="footer-links">
            <li><a href="#">About us</a></li>
            <li><a href="#">Cooperation</a></li>
            <li><a href="#">Agreement</a></li>
            <li><a href="#">Contact us</a></li>
            <li><a href="#">FAQ</a></li>
        </ul>
        <ul class="social-icons">
            <li><a href="#">X</a></li>
            <li><a href="#">Reddit</a></li>
            <li><a href="#">Ins</a></li>
        </ul>
        <p>Copyright © 2077</p>
    </footer>
</footer>
</body>
</html>


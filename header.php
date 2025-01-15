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
            <li><a href="login.php">Log in</a></li>
            <li><a href="register.php">Sign up</a></li>
            <li><a href="contract.php">Help</a></li>
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
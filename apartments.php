<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Apartments</title>
    <link rel="stylesheet" href="styleindex.css">
    <link rel="stylesheet" href="styleapartments.css">
</head>
<body>
    <!-- 顶部导航栏 -->
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
                <li><a href="login.php">Log in</a></li>
                <li><a href="register.php">Sign up</a></li>
                <li><a href="#">Help</a></li>
            </ul>
        </nav>
    </header>

    <!-- 筛选器部分 -->
    <div class="filters">
        <select name="price">
            <option value="">Price Range</option>
            <option value="0-500">€0 - €500</option>
            <option value="501-1000">€501 - €1000</option>
            <option value="1001+">€1001+</option>
        </select>
        <select name="type">
            <option value="">Room Type</option>
            <option value="studio">Studio</option>
            <option value="shared">Shared Room</option>
            <option value="private">Private Room</option>
        </select>
        <select name="location">
            <option value="">Location</option>
            <option value="paris">Paris</option>
            <option value="lyon">Lyon</option>
            <option value="marseille">Marseille</option>
        </select>
    </div>

    <!-- 房源列表 -->
    <div class="apartments-container">
        <!-- 房源卡片 1 -->
        <div class="apartment-card">
            <img src="pics/apartment1.jpg" alt="Apartment 1">
            <div class="apartment-info">
                <h3>Luxury Studio in Paris</h3>
                <p class="location">Paris, 5th District</p>
                <p class="price">€800/month</p>
                <div class="features">
                    <span>20m²</span>
                    <span>Furnished</span>
                    <span>WiFi</span>
                </div>
                <button class="view-details">View Details</button>
            </div>
        </div>

        <!-- 房源卡片 2 -->
        <div class="apartment-card">
            <img src="pics/apartment2.jpg" alt="Apartment 2">
            <div class="apartment-info">
                <h3>Modern Shared Room</h3>
                <p class="location">Lyon, City Center</p>
                <p class="price">€500/month</p>
                <div class="features">
                    <span>15m²</span>
                    <span>Shared Kitchen</span>
                    <span>Garden</span>
                </div>
                <button class="view-details">View Details</button>
            </div>
        </div>

        <!-- 更多房源卡片... -->
    </div>

    <!-- 分页 -->
    <div class="pagination">
        <a href="#" class="active">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">Next</a>
    </div>

    <!-- 页脚 -->
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
</body>
</html> 
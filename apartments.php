<?php
// 添加在文件开头用于调试
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 检查图片文件是否存在
$debugImagePath = "pics/rental/1.jpg";
if (file_exists($debugImagePath)) {
    error_log("Image exists: " . $debugImagePath);
} else {
    error_log("Image not found: " . $debugImagePath);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Apartments</title>
    <link rel="stylesheet" href="css/styleindex.css">
    <link rel="stylesheet" href="css/styleapartments.css">
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
        <?php
        require_once 'conn.php';

        $apartments = getApartmentsWithPictures();
        foreach ($apartments as $index => $apartment) {
            $imageNumber = $index + 1;
            $picture_64 = $apartment['picture'];
        ?>
            <div class="apartment-card">
                <div class="card-header">
                    <span class="featured-tag">À la une</span>
                    <button class="favorite-btn">
                        <svg viewBox="0 0 24 24" width="24" height="24">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" fill="none" stroke="currentColor"/>
                        </svg>
                    </button>
                </div>
                <a href="detail.php">
                   <?php echo '<img src="' . htmlspecialchars($picture_64) . '" alt="Room Image" width="300">'?>;
                </a>
                <div class="apartment-info">
                    <h3><?php echo $apartment['title']; ?></h3>
                    <div class="basic-info">
                        <span><?php echo $apartment['persons']; ?></span>
                        <span>•</span>
                        <span><?php echo $apartment['type']; ?></span>
                    </div>
                    <div class="payment-info">
                        <span class="payment-badge">Paiement en ligne</span>
                    </div>
                    <div class="price-info">
                        <span class="price-label">à partir de</span>
                        <span class="price"><?php echo $apartment['price']; ?> €</span>
                        <span class="price-period">/ mois</span>
                    </div>
                    <p class="location"><?php echo $apartment['location']; ?></p>
                </div>
            </div>
        <?php } ?>
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
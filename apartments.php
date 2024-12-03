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
        <!-- 房源卡片 1-10 的循环 -->
        <?php
        $apartments = [
            [
                'title' => 'Studio meublé proche campus',
                'persons' => '1-2 pers.',
                'type' => 'Studio',
                'price' => '450',
                'location' => 'Paris 5ème - Quartier Latin'
            ],
            [
                'title' => 'Grand appartement lumineux',
                'persons' => '2-3 pers.',
                'type' => 'T3',
                'price' => '850',
                'location' => 'Lyon Centre - Part-Dieu'
            ],
            [
                'title' => 'Colocation moderne',
                'persons' => '4 pers.',
                'type' => 'T4',
                'price' => '400',
                'location' => 'Marseille 1er'
            ],
            [
                'title' => 'Studio rénové avec balcon',
                'persons' => '1 pers.',
                'type' => 'Studio',
                'price' => '580',
                'location' => 'Nice Centre'
            ],
            [
                'title' => 'Appartement avec vue sur jardin',
                'persons' => '2 pers.',
                'type' => 'T2',
                'price' => '650',
                'location' => 'Bordeaux Chartrons'
            ],
            [
                'title' => 'Duplex centre historique',
                'persons' => '2-3 pers.',
                'type' => 'T3',
                'price' => '780',
                'location' => 'Toulouse Capitole'
            ],
            [
                'title' => 'Studio étudiant équipé',
                'persons' => '1 pers.',
                'type' => 'Studio',
                'price' => '420',
                'location' => 'Montpellier Facultés'
            ],
            [
                'title' => 'Appartement contemporain',
                'persons' => '2 pers.',
                'type' => 'T2',
                'price' => '700',
                'location' => 'Nantes Centre'
            ],
            [
                'title' => 'Colocation standing',
                'persons' => '3 pers.',
                'type' => 'T4',
                'price' => '500',
                'location' => 'Strasbourg - Orangerie'
            ],
            [
                'title' => 'Studio neuf avec terrasse',
                'persons' => '1-2 pers.',
                'type' => 'Studio',
                'price' => '550',
                'location' => 'Lille Vieux-Lille'
            ]
        ];

        foreach ($apartments as $index => $apartment) {
            $imageNumber = ($index % 3) + 1; // 循环使用1-3号图片
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
                <img src="./pics/rental/<?php echo $imageNumber; ?>.png" alt="<?php echo $apartment['title']; ?>" onerror="this.onerror=null; this.src='pics/default.jpg';" />
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
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
<?php include 'header.php';?>
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

    // 获取关键词
    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

    // 设置分页参数
    $itemsPerPage = 5;
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $page = max($page, 1);
    $offset = ($page - 1) * $itemsPerPage;

    // 查询符合条件的房源
    $apartments = getApartmentsWithKeyword($keyword, $itemsPerPage, $offset);

    // 获取用户已收藏的房源列表
    $userId = 1; // 假设当前用户 ID 为 1
    $favorites = getUserFavorites($userId);

    // 计算总页数
    $totalItems = getTotalApartmentsCount($keyword);
    $totalPages = ceil($totalItems / $itemsPerPage);

    foreach ($apartments as $index => $apartment) {
        $isFavorited = in_array($apartment['room_id'], $favorites);
        $fillColor = $isFavorited ? 'red' : 'none';
        $strokeColor = $isFavorited ? 'red' : 'currentColor';
    ?>
        <div class="apartment-card">
            <div class="card-header">
                <span class="featured-tag">À la une</span>
                <button class="favorite-btn" data-room-id="<?php echo $apartment['room_id']; ?>" data-user-id="<?php echo $userId; ?>">
                    <svg viewBox="0 0 24 24" width="24" height="24">
                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" 
                              fill="<?php echo $fillColor; ?>" 
                              stroke="<?php echo $strokeColor; ?>"/>
                    </svg>
                </button>
            </div>
            <!--  Prevent xss attacks  -->
            <a href="detail.php">
                <?php echo '<img src="' . htmlspecialchars($apartment['picture']) . '" alt="Room Image" width="300">'; ?>
            </a>
            <div class="apartment-info">
                <h3><?php echo htmlspecialchars($apartment['title']); ?></h3>
                <div class="basic-info">
                    <span><?php echo htmlspecialchars($apartment['persons']); ?></span>
                    <span>•</span>
                    <span><?php echo htmlspecialchars($apartment['type']); ?></span>
                </div>
                <div class="payment-info">
                    <span class="payment-badge">Paiement en ligne</span>
                </div>
                <div class="price-info">
                    <span class="price-label">à partir de</span>
                    <span class="price"><?php echo htmlspecialchars($apartment['price']); ?> €</span>
                    <span class="price-period">/ mois</span>
                </div>
                <p class="location"><?php echo htmlspecialchars($apartment['location']); ?></p>
            </div>
        </div>
    <?php } ?>
</div>


    <!-- 分页链接 -->
<div class="pagination">
    <?php if ($page > 1): ?>
        <a href="?keyword=<?php echo urlencode($keyword); ?>&amp;page=<?php echo $page - 1; ?>">Previous</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?keyword=<?php echo urlencode($keyword); ?>&amp;page=<?php echo $i; ?>" class="<?php echo $i === $page ? 'active' : ''; ?>">
            <?php echo $i; ?>
        </a>
    <?php endfor; ?>

    <?php if ($page < $totalPages): ?>
        <a href="?keyword=<?php echo urlencode($keyword); ?>&amp;page=<?php echo $page + 1; ?>">Next</a>
    <?php endif; ?>
</div>


    <!-- 页脚 -->
<?php include 'footer.php';?>

    <script>
    document.querySelectorAll('.favorite-btn').forEach(button => {
        button.addEventListener('click', function () {
            const roomId = this.getAttribute('data-room-id');
            const userId = this.getAttribute('data-user-id');
            const svgPath = this.querySelector('svg path');

            fetch('toggle_favorite.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ room_id: roomId, user_id: userId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    if (data.action === 'added') {
                        svgPath.setAttribute('fill', 'red');
                        alert("Added to favorites!");
                    } else if (data.action === 'removed') {
                        svgPath.setAttribute('fill', 'none');
                        alert("Removed from favorites!");
                    }
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
</script>
</body>
</html> 
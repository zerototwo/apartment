<?php
// 添加调试信息
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 引入数据库连接
require_once 'conn.php';

// 假设当前用户 ID 为 1
$userId = 1;

// 设置分页参数
$itemsPerPage = 5; // 每页显示 5 条收藏记录
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1);
$offset = ($page - 1) * $itemsPerPage;

// 查询用户的收藏列表（分页）
$favorites = getUserFavoriteApartments($userId, $itemsPerPage, $offset);

// 获取用户收藏的房源总数
$totalItems = getTotalFavoritesCount($userId);
$totalPages = ceil($totalItems / $itemsPerPage);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Favorites</title>
    <link rel="stylesheet" href="css/styleindex.css">
    <link rel="stylesheet" href="css/styleapartments.css">
</head>
<body>
<?php include 'header.php'; ?>

<h1>My Favorite Apartments</h1>

<div class="apartments-container">
    <?php if (!empty($favorites)): ?>
        <?php foreach ($favorites as $apartment): ?>
            <div class="apartment-card">
                <div class="card-header">
                    <span class="featured-tag">À la une</span>
                    <button class="favorite-btn unfavorite-btn" data-room-id="<?php echo $apartment['room_id']; ?>" data-user-id="<?php echo $userId; ?>">
                        <svg viewBox="0 0 24 24" width="24" height="24">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" 
                                  fill="red" 
                                  stroke="red"/>
                        </svg>
                    </button>
                </div>
                <a href="detail.php?room_id=<?php echo $apartment['room_id']; ?>">
                    <img src="<?php echo htmlspecialchars($apartment['picture']); ?>" alt="Room Image" width="300">
                </a>
                <div class="apartment-info">
                    <h3><?php echo htmlspecialchars($apartment['title']); ?></h3>
                    <p>Location: <?php echo htmlspecialchars($apartment['location']); ?></p>
                    <p>Price: <?php echo htmlspecialchars($apartment['price']); ?> € / month</p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>You have no favorite apartments yet.</p>
    <?php endif; ?>
</div>

<!-- 分页链接 -->
<div class="pagination">
    <?php if ($page > 1): ?>
        <a href="favorite.php?page=<?php echo $page - 1; ?>">Previous</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="favorite.php?page=<?php echo $i; ?>" class="<?php echo $i === $page ? 'active' : ''; ?>">
            <?php echo $i; ?>
        </a>
    <?php endfor; ?>

    <?php if ($page < $totalPages): ?>
        <a href="favorite.php?page=<?php echo $page + 1; ?>">Next</a>
    <?php endif; ?>
</div>

<script>
    // 取消收藏功能
    document.querySelectorAll('.unfavorite-btn').forEach(button => {
        button.addEventListener('click', function () {
            const roomId = this.getAttribute('data-room-id');
            const userId = this.getAttribute('data-user-id');

            fetch('toggle_favorite.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ room_id: roomId, user_id: userId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success && data.action === 'removed') {
                    alert("Removed from favorites!");
                    this.closest('.apartment-card').remove();
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

<?php include 'footer.php'; ?>
</body>
</html>
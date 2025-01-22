<?php
session_start();
require_once 'conn.php'; // 数据库连接文件
$conn = db_connect(); // 使用自定义的 db_connect() 函数
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #6c63ff;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s ease;
            margin-bottom: 10px;
            width: 150px;
            text-align: center;
        }
        .button:hover {
            background-color: #5146c8;
        }
        button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #6c63ff;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #5146c8;
        }
        .sidebar {
            width: 200px;
            text-align: center;
            padding: 20px;
            background-color: #f4f4f9;
            border-right: 1px solid #ddd;
        }
        .sidebar img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 20px;
        }
        .main {
            margin-left: 220px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="sidebar">
    <?php
    // 确保会话已启动并数据库已连接
    session_start();
    require_once 'conn.php'; // 引入数据库连接文件
    $conn = db_connect(); // 获取数据库连接

    $avatarPath = 'pics/default_avatar.jpg'; // 默认头像路径

    // 检查用户是否已登录
    if (isset($_SESSION['user_Iduser'])) {
        $userId = $_SESSION['user_Iduser'];

        try {
            // 查询用户头像路径
            $stmt = $conn->prepare("SELECT avatar FROM users WHERE user_id = ?");
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $avatarPath = !empty($row['avatar']) ? $row['avatar'] : $avatarPath;
            }
        } catch (Exception $e) {
            error_log("Error fetching user avatar: " . $e->getMessage());
        }
    }

    // 关闭数据库连接
    $conn->close();
    ?>

    <!-- 动态显示头像 -->
    <img src="<?php echo htmlspecialchars($avatarPath); ?>" alt="Avatar">
    <!-- 跳转到论坛主页的按钮 -->
    <a href="forum.php" class="button">Go to Forum</a>
    <!-- 跳转到条款和条件页面的按钮 -->
    <a href="terms and conditions.html" class="button">Terms and Conditions</a>
</div>

    <div class="main">
        <div class="profile-section">
        <h2>My Profile</h2>
        <?php
        if (isset($_SESSION['user_Iduser'])) {
            $userId = $_SESSION['user_Iduser']; // 从会话中获取用户 ID

            try {
                // 使用 PDO 的预处理语句查询用户信息
                $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = ?");
                $stmt->execute([$userId]);
                $userData = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($userData) {
                    // 如果查询成功，安全显示用户信息
                    echo '<table>';
                    echo '<tr><td>Name</td><td><input type="text" id="name" value="' . htmlspecialchars($userData["name"]) . '" readonly></td><td><button type="button" onclick="enableEdit(this, \'name\')">EDIT</button></td></tr>';
                    echo '<tr><td>Family name</td><td><input type="text" id="family_name" value="' . htmlspecialchars($userData["family_name"]) . '" readonly></td><td><button type="button" onclick="enableEdit(this, \'family_name\')">EDIT</button></td></tr>';
                    echo '<tr><td>Address</td><td><input type="text" id="address" value="' . htmlspecialchars($userData["address"]) . '" readonly></td><td><button type="button" onclick="enableEdit(this, \'address\')">EDIT</button></td></tr>';
                    echo '<tr><td>Username</td><td><input type="text" id="username" value="' . htmlspecialchars($userData["username"]) . '" readonly></td><td><button type="button" onclick="enableEdit(this, \'username\')">EDIT</button></td></tr>';
                    echo '<tr><td>Password</td><td><input type="password" id="password" value="' . htmlspecialchars($userData["password"]) . '" readonly></td><td><button type="button" onclick="togglePasswordView()">VIEW</button> <button type="button" onclick="enableEdit(this, \'password\')">EDIT</button></td></tr>';
                    echo '<tr><td>Phone number</td><td><input type="text" id="phone_number" value="' . htmlspecialchars($userData["phone_number"]) . '" readonly></td><td><button type="button" onclick="enableEdit(this, \'phone_number\')">EDIT</button></td></tr>';
                    echo '<tr><td>E-mail address</td><td><input type="email" id="email" value="' . htmlspecialchars($userData["email"]) . '" readonly></td><td><button type="button" onclick="enableEdit(this, \'email\')">EDIT</button></td></tr>';
                    echo '<tr><td>RIB</td><td><a href="rib_placeholder.pdf" target="_blank">rib.pdf</a></td><td><button type="button" onclick="alert(\'RIB editing functionality not implemented yet\')">EDIT</button></td></tr>';
                    echo '</table>';
                } else {
                    echo "User information not found.";
                }
            } catch (Exception $e) {
                // 捕获异常并显示友好的错误信息
                echo "An error occurred while fetching user information. Please try again later.";
                error_log($e->getMessage()); // 将详细错误记录到服务器日志
            }
        } else {
            echo "You are not logged in. Please <a href='login.php'>log in</a>.";
        }
        ?>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    <script src="js/scripts.js"></script>
</body>
</html>

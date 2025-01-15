<?php
// 数据库连接配置
$host = "localhost";
$username = "root"; // 数据库用户名
$password = "Qwerty@12345"; // 数据库密码
$database = "rental_management"; // 数据库名称

// 创建数据库连接
$conn = new mysqli($host, $username, $password, $database);

// 检查连接是否成功
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 获取搜索关键字
$search = isset($_GET['search']) ? $_GET['search'] : '';

// 查询合同数据
if (!empty($search)) {
    $sql = "SELECT id, property_name, tenant_name, start_date, end_date 
            FROM contracts 
            WHERE property_name LIKE ? OR tenant_name LIKE ?";
    $stmt = $conn->prepare($sql);
    $search_param = "%" . $search . "%";
    $stmt->bind_param("ss", $search_param, $search_param);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $sql = "SELECT id, property_name, tenant_name, start_date, end_date FROM contracts";
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contract Management</title>
    <link rel="stylesheet" href="css/receive.css"> <!-- 引入统一样式 -->
</head>
<body>
    <div class="admin-panel">
        <div class="sidebar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="property_list.php" class="active">Property Management</a></li>
                <li><a href="user_management.php">User Management</a></li>
                <li><a href="contract_management.php">Contract Management</a></li>
                <!-- <li><a href="logout.php">Logout</a></li> -->
            </ul>
        </div>
        <div class="content">
            <h1>Contract Management</h1>
            <form method="GET" action="contract_management.php" class="search-form">
                <input type="text" name="search" placeholder="Search by property name or tenant name" value="<?php echo htmlspecialchars($search); ?>">
                <button type="submit" style="background-color: #28a745; color: white; border: none; padding: 8px 12px; border-radius: 5px; cursor: pointer;">Search</button>
            </form>
            <table>
                <thead>
                    <tr>
                        <th>Contract ID</th>
                        <th>Property Name</th>
                        <th>Tenant Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['property_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['tenant_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['start_date']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['end_date']) . "</td>";
                            echo "<td>";
                            echo "<form action='delete_contract.php' method='POST' onsubmit='return confirm(\"Are you sure you want to delete this contract?\");'>";
                            echo "<input type='hidden' name='id' value='" . htmlspecialchars($row['id']) . "'>";
                            echo "<button type='submit'>Delete</button>";
                            echo "</form>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No contracts found matching your search.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php
// 关闭数据库连接
$conn->close();
?>

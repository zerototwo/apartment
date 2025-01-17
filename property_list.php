<?php
// 数据库连接配置
$host = "localhost";
$username = "root";
$password = "Qwerty@12345";
$database = "apartment";

// 创建数据库连接
$conn = new mysqli($host, $username, $password, $database);

// 检查连接是否成功
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 获取搜索关键字
$search = isset($_GET['search']) ? $_GET['search'] : '';

// 查询数据
if (!empty($search)) {
    $sql = "SELECT id, property_name, contact, owner_name, phone, type, address, size, lease_start, lease_end, price_per_day, total, payment_status, approval_status, image_path 
            FROM properties 
            WHERE property_name LIKE ? 
               OR owner_name LIKE ? 
               OR address LIKE ?";
    $stmt = $conn->prepare($sql);
    $search_param = "%" . $search . "%";
    $stmt->bind_param("sss", $search_param, $search_param, $search_param);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $sql = "SELECT id, property_name, contact, owner_name, phone, type, address, size, lease_start, lease_end, price_per_day, total, payment_status, approval_status, image_path 
            FROM properties";
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Management</title>
    <link rel="stylesheet" href="css/receive.css"> <!-- 引入统一样式 -->
</head>

<body>

    <div class="admin-panel">
        <div class="sidebar">
            <ul>
                <li><a href="index.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">Home</a></li>
                <li><a href="property_list.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'property_list.php' ? 'active' : ''; ?>">Property Management</a></li>
                <li><a href="user_management.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'user_management.php' ? 'active' : ''; ?>">User Management</a></li>
                <li><a href="contract_management.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'contract_management.php' ? 'active' : ''; ?>">Contract Management</a></li>
            </ul>
        </div>

        <div class="content">
            <h1>Property List</h1>
            <form method="GET" action="property_list.php" class="search-form">
                <input type="text" name="search" placeholder="Search by property name, owner, or address" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                <button type="submit">Search</button>
            </form>
            <table>
                <thead>
                    <tr>
                        <th>Property Name</th>
                        <th>Contact</th>
                        <th>Owner</th>
                        <th>Phone</th>
                        <th>Type</th>
                        <th>Address</th>
                        <th>Size</th>
                        <th>Lease Start</th>
                        <th>Lease End</th>
                        <th>Price per Day</th>
                        <th>Total</th>
                        <th>Payment Status</th>
                        <th>Approval Status</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['property_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['contact']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['owner_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['type']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['address']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['size']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['lease_start']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['lease_end']) . "</td>";
                            echo "<td>€" . htmlspecialchars($row['price_per_day']) . "</td>";
                            echo "<td>€" . htmlspecialchars($row['total']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['payment_status']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['approval_status']) . "</td>";
                            echo "<td><img src='" . htmlspecialchars($row['image_path']) . "' alt='Property Image'></td>";
                            echo "<td>";
                            echo "<form action='delete_property.php' method='POST' onsubmit='return confirm(\"Are you sure you want to delete this property?\");'>";
                            echo "<input type='hidden' name='id' value='" . htmlspecialchars($row['id']) . "'>";
                            echo "<button type='submit'>Delete</button>";
                            echo "</form>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='15'>No properties found matching your search.</td></tr>";
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
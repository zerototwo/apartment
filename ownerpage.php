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
    die("Database connection failed: " . $conn->connect_error);
}

// 获取当前登录用户的房主信息（模拟登录用户）
$logged_in_owner = "John Doe"; // 替换为实际的登录逻辑，例如 $_SESSION['owner_name']

// 获取搜索关键字
$search = isset($_GET['search']) ? $_GET['search'] : '';

$result = null; // 初始化 $result 变量
$stmt = null;   // 初始化 $stmt 变量

// 查询数据
if (!empty($search)) {
    $sql = "SELECT id, property_name, contact, owner_name, phone, type, address, size, lease_start, lease_end, price_per_day, total, payment_status, approval_status, image_path 
            FROM properties 
            WHERE (property_name LIKE ? OR address LIKE ?) 
              AND owner_name = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) { // 检查 $stmt 是否成功
        $search_param = "%" . $search . "%";
        $stmt->bind_param("sss", $search_param, $search_param, $logged_in_owner);
        $stmt->execute();
        $result = $stmt->get_result();
    } else {
        echo "Error in SQL statement preparation: " . $conn->error;
    }
} else {
    $sql = "SELECT id, property_name, contact, owner_name, phone, type, address, size, lease_start, lease_end, price_per_day, total, payment_status, approval_status, image_path 
            FROM properties 
            WHERE owner_name = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) { // 检查 $stmt 是否成功
        $stmt->bind_param("s", $logged_in_owner);
        $stmt->execute();
        $result = $stmt->get_result();
    } else {
        echo "Error in SQL statement preparation: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Property List</title>
    <link rel="stylesheet" href="css/owner.css">
</head>
<body>

    <!-- 顶部导航栏 -->
    <div class="header">
        <div class="logo">
            <img src="./crap/logo.png" alt="Logo">
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="apartments.php">Apartment</a></li>
                <li><a href="login.php">Log in</a></li>
                <li><a href="register.php">Sign up</a></li>
            </ul>
        </nav>
    </div>

    <!-- 内容区域 -->
    <div class="content">
        <h1>My Property List</h1>
        <form method="GET" action="" class="search-form">
    <input type="text" name="search" placeholder="Search by property name or address" value="<?php echo htmlspecialchars($search); ?>">
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
                if ($result && $result->num_rows > 0) {
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
                        echo "<td><button onclick='openModal(" . json_encode($row) . ")'>Edit</button></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='15'>No properties found matching your search.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- 编辑弹窗 -->
    <div id="editModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Edit Property</h2>
            <form id="editForm">
                <input type="hidden" id="propertyId">
                <div><label>Property Name: <input type="text" id="propertyName"></label></div>
                <div><label>Contact: <input type="text" id="contact"></label></div>
                <div><label>Owner: <input type="text" id="ownerName"></label></div>
                <div><label>Phone: <input type="text" id="phone"></label></div>
                <div><label>Type: <input type="text" id="type"></label></div>
                <div><label>Address: <input type="text" id="address"></label></div>
                <div><label>Size: <input type="text" id="size"></label></div>
                <div><label>Lease Start: <input type="date" id="leaseStart"></label></div>
                <div><label>Lease End: <input type="date" id="leaseEnd"></label></div>
                <div><label>Price per Day: <input type="number" id="pricePerDay"></label></div>
                <div><label>Payment Status: <input type="text" id="paymentStatus"></label></div>
                <div><label>Approval Status: <input type="text" id="approvalStatus"></label></div>
                <div><label>Image Path: <input type="text" id="imagePath"></label></div>
                <button type="button" onclick="submitEdit()">Save</button>
                <button type="button" onclick="closeModal()">Cancel</button>
            </form>
        </div>
    </div>

    <script>
        function openModal(data) {
            const property = JSON.parse(data);
            document.getElementById('propertyId').value = property.id;
            document.getElementById('propertyName').value = property.property_name;
            document.getElementById('contact').value = property.contact;
            document.getElementById('ownerName').value = property.owner_name;
            document.getElementById('phone').value = property.phone;
            document.getElementById('type').value = property.type;
            document.getElementById('address').value = property.address;
            document.getElementById('size').value = property.size;
            document.getElementById('leaseStart').value = property.lease_start;
            document.getElementById('leaseEnd').value = property.lease_end;
            document.getElementById('pricePerDay').value = property.price_per_day;
            document.getElementById('paymentStatus').value = property.payment_status;
            document.getElementById('approvalStatus').value = property.approval_status;
            document.getElementById('imagePath').value = property.image_path;
            document.getElementById('editModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('editModal').style.display = 'none';
        }

        function submitEdit() {
            const data = {
                id: document.getElementById('propertyId').value,
                property_name: document.getElementById('propertyName').value,
                contact: document.getElementById('contact').value,
                owner_name: document.getElementById('ownerName').value,
                phone: document.getElementById('phone').value,
                type: document.getElementById('type').value,
                address: document.getElementById('address').value,
                size: document.getElementById('size').value,
                lease_start: document.getElementById('leaseStart').value,
                lease_end: document.getElementById('leaseEnd').value,
                price_per_day: document.getElementById('pricePerDay').value,
                payment_status: document.getElementById('paymentStatus').value,
                approval_status: document.getElementById('approvalStatus').value,
                image_path: document.getElementById('imagePath').value
            };

            fetch('updateownerpage.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(result => {
                if (result.success) {
                    alert('Property updated successfully!');
                    location.reload();
                } else {
                    alert('Failed to update property: ' + result.error);
                }
            })
            .catch(error => console.error('Error:', error));
        }
    </script>
</body>
</html>

<?php
// 关闭数据库连接
if ($stmt) {
    $stmt->close();
}
$conn->close();
?>

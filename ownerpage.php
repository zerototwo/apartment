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
    <link rel="stylesheet" href="css/owner.css?v=1.1">

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
        <!-- 新增按钮 -->
        <button onclick="openAddModal()">Add New Property</button>
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
                        echo "<td><button onclick='openModal(" . htmlspecialchars(json_encode($row), ENT_QUOTES, 'UTF-8') . ")'>Edit</button></td>";



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
    <!-- 模态框 HTML -->
    <div id="editModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Edit Property</h2>
            <form id="editForm">
                <input type="hidden" id="id" name="id">
                <label>Property Name: <input type="text" id="property_name" name="property_name" required></label><br>
                <label>Contact: <input type="text" id="contact" name="contact" required></label><br>
                <label>Owner: <input type="text" id="owner_name" name="owner_name" required></label><br>
                <label>Phone: <input type="text" id="phone" name="phone" required></label><br>
                <label>Type: <input type="text" id="type" name="type" required></label><br>
                <label>Address: <input type="text" id="address" name="address" required></label><br>
                <label>Size: <input type="text" id="size" name="size" required></label><br>
                <label>Lease Start: <input type="date" id="lease_start" name="lease_start" required></label><br>
                <label>Lease End: <input type="date" id="lease_end" name="lease_end" required></label><br>
                <label>Price per Day: <input type="number" id="price_per_day" name="price_per_day" required></label><br>
                <label>Total: <input type="number" id="total" name="total" required></label><br>
                <label>Payment Status: <input type="text" id="payment_status" name="payment_status"></label><br>
                <label>Approval Status: <input type="text" id="approval_status" name="approval_status"></label><br>
                <label>Image Path: <input type="text" id="image_path" name="image_path"></label><br>
                <button type="button" onclick="submitEdit()">Save</button>
                <button type="button" onclick="closeModal()">Cancel</button>
            </form>
        </div>
    </div>

    <div id="addModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="closeAddModal()">&times;</span>
            <h2>Add New Property</h2>
            <form id="addForm">
                <label>Property Name: <input type="text" id="new_property_name" name="property_name" required></label><br>
                <label>Contact: <input type="text" id="new_contact" name="contact" required></label><br>
                <label>Owner: <input type="text" id="new_owner_name" name="owner_name" required></label><br>
                <label>Phone: <input type="text" id="new_phone" name="phone" required></label><br>
                <label>Type: <input type="text" id="new_type" name="type" required></label><br>
                <label>Address: <input type="text" id="new_address" name="address" required></label><br>
                <label>Size: <input type="text" id="new_size" name="size" required></label><br>
                <label>Lease Start: <input type="date" id="new_lease_start" name="lease_start" required></label><br>
                <label>Lease End: <input type="date" id="new_lease_end" name="lease_end" required></label><br>
                <label>Price per Day: <input type="number" id="new_price_per_day" name="price_per_day" required></label><br>
                <label>Total: <input type="number" id="new_total" name="total" required></label><br>
                <label>Payment Status: <input type="text" id="new_payment_status" name="payment_status"></label><br>
                <label>Approval Status: <input type="text" id="new_approval_status" name="approval_status"></label><br>
                <label>Image Path: <input type="text" id="new_image_path" name="image_path"></label><br>
                <button type="button" onclick="submitAdd()">Save</button>
                <button type="button" onclick="closeAddModal()">Cancel</button>
            </form>
        </div>
    </div>


    <script>
        // 打开模态框并填充数据
        function openModal(data) {
            if (typeof data === "string") {
                // 确保 data 是 JSON 字符串
                data = JSON.parse(data);
            }
            console.log("Data received in modal:", data);
            Object.keys(data).forEach(key => {
                if (document.getElementById(key)) {
                    document.getElementById(key).value = data[key];
                }
            });
            document.getElementById('editModal').style.display = 'block';
        }

        // 关闭模态框
        function closeModal() {
            document.getElementById('editModal').style.display = 'none';
        }

        // 提交编辑表单
        function submitEdit() {
            // 获取表单数据
            const formData = new FormData(document.getElementById('editForm'));
            const data = Object.fromEntries(formData); // 将表单数据转为对象


            // 必填字段判空
            const requiredFields = [
                'property_name', 'contact', 'owner_name', 'phone',
                'type', 'address', 'size', 'lease_start',
                'lease_end', 'price_per_day', 'total'
            ];
            for (const field of requiredFields) {
                if (!data[field] || data[field].trim() === '') {
                    alert(`The field "${field.replace('_', ' ')}" is required!`);
                    return; // 阻止提交
                }
            }

            // 发送请求到后端
            fetch('updateownerpage.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data) // 包括 total 字段
                })
                .then(response => response.json()) // 确保后端返回 JSON
                .then(result => {
                    console.log("Server response:", result); // 检查服务器返回
                    if (result.success) {
                        alert('Property updated successfully!');
                        location.reload();
                    } else {
                        alert('Update failed: ' + result.error);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        function openAddModal() {
            document.getElementById('addModal').style.display = 'block';
        }

        // 确保绑定到全局作用域
        window.openAddModal = openAddModal;
        // 提交新增表单
        function submitAdd() {
            // 获取表单数据
            const formData = new FormData(document.getElementById('addForm'));
            const data = Object.fromEntries(formData); // 将表单数据转为对象

            // 必填字段判空
            const requiredFields = [
                'property_name', 'contact', 'owner_name', 'phone',
                'type', 'address', 'size', 'lease_start',
                'lease_end', 'price_per_day', 'total'
            ];
            for (const field of requiredFields) {
                if (!data[field] || data[field].trim() === '') {
                    alert(`The field "${field.replace('_', ' ')}" is required!`);
                    return; // 阻止提交
                }
            }


            // 发送请求到后端
            fetch('addownerpage.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data) // 包括 total 字段
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(result => {
                    if (result.success) {
                        alert('Property added successfully!');
                        location.reload(); // 刷新页面
                    } else {
                        alert('Failed to add property: ' + result.error);
                    }
                })
                .catch(error => console.error('Error:', error));
        }


        // 关闭模态框
        function closeAddModal() {
            document.getElementById('addModal').style.display = 'none';
        }
        window.closeAddModal = closeAddModal;
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
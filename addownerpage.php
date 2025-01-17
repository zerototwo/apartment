<?php
// 禁止 PHP 输出 HTML 错误信息
ini_set('display_errors', 0);

// 数据库连接
$host = "localhost";
$username = "root";
$password = "Qwerty@12345";
$database = "apartment";

$conn = new mysqli($host, $username, $password, $database);

// 检查连接是否成功
if ($conn->connect_error) {
    echo json_encode(["success" => false, "error" => "Database connection failed"]);
    exit;
}

// 获取前端数据
$data = json_decode(file_get_contents('php://input'), true);

// 必填字段列表
$requiredFields = ['property_name', 'contact', 'owner_name', 'phone', 'type', 'address', 'size', 'lease_start', 'lease_end', 'price_per_day', 'total'];

// 检查每个必填字段是否为空
foreach ($requiredFields as $field) {
    if (empty($data[$field]) || trim($data[$field]) === '') {
        echo json_encode(["success" => false, "error" => "The field \"$field\" is required!"]);
        exit;
    }
}

// 提取数据
$property_name = $data['property_name'];
$contact = $data['contact'];
$owner_name = $data['owner_name'];
$phone = $data['phone'];
$type = $data['type'];
$address = $data['address'];
$size = $data['size'];
$lease_start = $data['lease_start'];
$lease_end = $data['lease_end'];
$price_per_day = $data['price_per_day'];
$total = $data['total']; // 新增字段
$payment_status = $data['payment_status'] ?? 'Pending';
$approval_status = $data['approval_status'] ?? 'Pending';
$image_path = $data['image_path'] ?? '';

// 插入数据库
$sql = "INSERT INTO properties (property_name, contact, owner_name, phone, type, address, size, lease_start, lease_end, price_per_day, total, payment_status, approval_status, image_path) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("sssssssssdssss", $property_name, $contact, $owner_name, $phone, $type, $address, $size, $lease_start, $lease_end, $price_per_day, $total, $payment_status, $approval_status, $image_path);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(["success" => false, "error" => "Failed to prepare SQL statement"]);
}

$conn->close();

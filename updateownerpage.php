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

// 获取前端传递的数据
$data = json_decode(file_get_contents('php://input'), true);

// 检查输入数据完整性
if (!isset($data['id'], $data['property_name'], $data['contact'], $data['owner_name'], $data['total'])) {
    echo json_encode(["success" => false, "error" => "Invalid input"]);
    exit;
}

// 提取数据
$id = $data['id'];
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
$total = $data['total']; // 确保 total 被包含
$payment_status = $data['payment_status'];
$approval_status = $data['approval_status'];
$image_path = $data['image_path'];

// 执行更新
$sql = "UPDATE properties SET property_name=?, contact=?, owner_name=?, phone=?, type=?, address=?, size=?, lease_start=?, lease_end=?, price_per_day=?, total=?, payment_status=?, approval_status=?, image_path=? WHERE id=?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("sssssssssdssssi", $property_name, $contact, $owner_name, $phone, $type, $address, $size, $lease_start, $lease_end, $price_per_day, $total, $payment_status, $approval_status, $image_path, $id);

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

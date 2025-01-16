<?php
// Include database connection
$host = "localhost";      // 数据库主机
$username = "root";       // 数据库用户名
$password = "Qwerty@12345";           // 数据库密码（如果没有密码，留空）
$database = "apartment"; // 数据库名称

// 创建数据库连接
$conn = new mysqli($host, $username, $password, $database);

// 检查连接是否成功
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Read JSON input
$data = json_decode(file_get_contents('php://input'), true);

// Validate input
if (!isset($data['id'], $data['property_name'], $data['contact'], $data['owner_name'], $data['phone'], $data['address'])) {
    echo json_encode(["success" => false, "error" => "Invalid input"]);
    exit;
}

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
$total = $data['total'];
$payment_status = $data['payment_status'];
$approval_status = $data['approval_status'];
$image_path = $data['image_path'];

// Prepare and execute SQL
$sql = "UPDATE properties SET 
            property_name=?, contact=?, owner_name=?, phone=?, type=?, address=?, size=?, 
            lease_start=?, lease_end=?, price_per_day=?, total=?, payment_status=?, 
            approval_status=?, image_path=? WHERE id=?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param(
        "ssssssssssssssi",
        $property_name, $contact, $owner_name, $phone, $type, $address, $size,
        $lease_start, $lease_end, $price_per_day, $total, $payment_status,
        $approval_status, $image_path, $id
    );

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(["success" => false, "error" => "Failed to prepare SQL"]);
}

$conn->close();
?>

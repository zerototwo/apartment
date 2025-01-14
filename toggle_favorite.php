<?php
require_once 'conn.php';

$data = json_decode(file_get_contents('php://input'), true);
$roomId = $data['room_id'];
$userId = $data['user_id'];

if ($roomId && $userId) {
    // 检查是否已收藏
    $stmt = $conn->prepare("SELECT * FROM favorites WHERE user_id = ? AND room_id = ?");
    $stmt->bind_param("ii", $userId, $roomId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // 已收藏，执行删除操作
        $stmt = $conn->prepare("DELETE FROM favorites WHERE user_id = ? AND room_id = ?");
        $stmt->bind_param("ii", $userId, $roomId);
        $stmt->execute();
        echo json_encode(['success' => true, 'action' => 'removed']);
    } else {
        // 未收藏，执行添加操作
        $stmt = $conn->prepare("INSERT INTO favorites (user_id, room_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $userId, $roomId);
        $stmt->execute();
        echo json_encode(['success' => true, 'action' => 'added']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid input']);
}

$conn->close();
?>
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
        // 已收藏，返回 success 状态
        echo json_encode(['success' => true, 'message' => 'Already added to favorites']);
    } else {
        // 插入收藏记录
        $stmt = $conn->prepare("INSERT INTO favorites (user_id, room_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $userId, $roomId);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to add to favorites']);
        }
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid input']);
}

$conn->close();
?>
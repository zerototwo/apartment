<?php
// 数据库连接信息
$servername = "localhost";
$username = "root";
$password = "root";
$database = "apartment";

// 创建数据库连接
$conn = new mysqli($servername, $username, $password, $database);

// 检查连接
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// 查询房间和图片的函数
function getApartmentsWithPictures() {
  global $conn;

  $sql = "SELECT r.room_id, r.title, r.persons, r.type, r.price, r.location, p.content AS picture
          FROM room r
          LEFT JOIN picture p ON r.room_id = p.room_id";

  $result = $conn->query($sql);
  $apartments = [];

  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          $apartments[] = $row;
      }
  }

  return $apartments;
}

// 关闭数据库连接的函数
function closeConnection() {
  global $conn;
  $conn->close();
}
?>

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
function getApartmentsWithPictures()
{
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

function getApartmentsWithKeyword($keyword, $limit, $offset)
{
  global $conn;

  // 使用通配符进行模糊查询
  $sql = "SELECT r.room_id, r.title, r.persons, r.type, r.price, r.location, 
                   COALESCE(p.content, '') AS picture
            FROM room r
            LEFT JOIN picture p ON r.room_id = p.room_id
            WHERE r.title LIKE ? OR r.location LIKE ? OR r.type LIKE ? OR r.location LIKE ?
            LIMIT ? OFFSET ?";

  // 绑定参数
  $stmt = $conn->prepare($sql);
  $searchKeyword = '%' . $keyword . '%';
  //防止 SQL 注入攻击
  $stmt->bind_param("ssssii", $searchKeyword, $searchKeyword, $searchKeyword, $searchKeyword, $limit, $offset);
  $stmt->execute();
  $result = $stmt->get_result();

  return $result->fetch_all(MYSQLI_ASSOC);
}

// 获取符合关键词的房源总数
function getTotalApartmentsCount($keyword)
{
  global $conn;

  $sql = "SELECT COUNT(*) AS total
          FROM room
          WHERE title LIKE ? OR location LIKE ? OR type LIKE ?";

  $stmt = $conn->prepare($sql);
  $searchKeyword = '%' . $keyword . '%';
  $stmt->bind_param("sss", $searchKeyword, $searchKeyword, $searchKeyword);
  $stmt->execute();
  $result = $stmt->get_result();

  return $result->fetch_assoc()['total'];
}

// 关闭数据库连接的函数
function closeConnection()
{
  global $conn;
  $conn->close();
}

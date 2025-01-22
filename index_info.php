<?php
session_start();
include 'includes/db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #6c63ff;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s ease;
            margin-bottom: 10px;
            width: 150px;
            text-align: center;
        }
        .button:hover {
            background-color: #5146c8;
        }
        button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #6c63ff;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #5146c8;
        }
        .sidebar {
            width: 200px;
            text-align: center;
            padding: 20px;
            background-color: #f4f4f9;
            border-right: 1px solid #ddd;
        }
        .sidebar img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 20px;
        }
        .main {
            margin-left: 220px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="sidebar">
        <!-- Display Avatar -->
        <img src="pics/avatar.jpg" alt="Avatar">
        <!-- Button to redirect to the forum homepage -->
        <a href="forum_homepage.php" class="button">Go to Forum</a>
        <!-- Button to redirect to the terms and conditions page -->
        <a href="terms_and_conditions.html" class="button">Terms and Conditions</a>
    </div>
	<div class="main">
        <div class="profile-section">
        <h2>My Profile</h2>
        <?php
        $userId = 2;
        $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo '<table>';
            echo '<tr><td>Name</td><td><input type="text" id="name" value="' . htmlspecialchars($row["name"]) . '" readonly></td><td><button type="button" onclick="enableEdit(this, \'name\')">EDIT</button></td></tr>';
            echo '<tr><td>Family name</td><td><input type="text" id="family_name" value="' . htmlspecialchars($row["family_name"]) . '" readonly></td><td><button type="button" onclick="enableEdit(this, \'family_name\')">EDIT</button></td></tr>';
            echo '<tr><td>Address</td><td><input type="text" id="address" value="' . htmlspecialchars($row["address"]) . '" readonly></td><td><button type="button" onclick="enableEdit(this, \'address\')">EDIT</button></td></tr>';
            echo '<tr><td>Username</td><td><input type="text" id="username" value="' . htmlspecialchars($row["username"]) . '" readonly></td><td><button type="button" onclick="enableEdit(this, \'username\')">EDIT</button></td></tr>';
            echo '<tr><td>Password</td><td><input type="password" id="password" value="' . htmlspecialchars($row["password"]) . '" readonly></td><td><button type="button" onclick="togglePasswordView()">VIEW</button> <button type="button" onclick="enableEdit(this, \'password\')">EDIT</button></td></tr>';
            echo '<tr><td>Phone number</td><td><input type="text" id="phone_number" value="' . htmlspecialchars($row["phone_number"]) . '" readonly></td><td><button type="button" onclick="enableEdit(this, \'phone_number\')">EDIT</button></td></tr>';
            echo '<tr><td>E-mail address</td><td><input type="email" id="email" value="' . htmlspecialchars($row["email"]) . '" readonly></td><td><button type="button" onclick="enableEdit(this, \'email\')">EDIT</button></td></tr>';
            echo '<tr><td>RIB</td><td><a href="rib_placeholder.pdf" target="_blank">rib.pdf</a></td><td><button type="button" onclick="alert(\'RIB editing functionality not implemented yet\')">EDIT</button></td></tr>';
            echo '</table>';
        } else {
            echo "User information not found.";
        }

        $stmt->close();
        ?>
    </div>
</div>


    <?php include 'footer.php'; ?>
    <script src="js/scripts.js"></script>
</body>
</html>

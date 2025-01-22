<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'user_profile_db');
    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }

    // Insert new comment
    if (isset($_POST['comment_content'], $_POST['post_id'])) {
        $post_id = (int)$_POST['post_id']; // Ensure post_id is an integer
        $content = $conn->real_escape_string($_POST['comment_content']); // Sanitize input
        $sql = "INSERT INTO comments (post_id, content) VALUES ('$post_id', '$content')";
        if ($conn->query($sql) === TRUE) {
            // Redirect to the forum homepage
            header('Location: forum.php');
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: Missing comment content or post ID.";
    }

    // Close the database connection
    $conn->close();
} else {
    // If accessed without POST, redirect to the homepage
    header('Location: forum.php');
    exit();
}
?>

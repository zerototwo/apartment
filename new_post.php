<?php include('header.php'); ?>

<main>
    <style>
        .forum-container {
            max-width: 800px;
            margin: 20px auto;
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }
        .create-post {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            background-color: #f9f9ff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .create-post h2 {
            margin-bottom: 15px;
            font-size: 1.8em;
            color: #333;
        }
        .create-post textarea {
            width: calc(100% - 30px);
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
            margin-bottom: 15px;
            resize: none;
            box-sizing: border-box;
        }
        .create-post button, .create-post a {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1em;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .create-post button {
            background-color: #6c63ff;
            color: white;
            border: none;
        }
        .create-post button:hover {
            background-color: #5753d4;
        }
        .create-post a {
            background-color: #ddd;
            color: #333;
            margin-left: 10px;
        }
        .create-post a:hover {
            background-color: #bbb;
        }
    </style>

    <div class="forum-container">

        <div class="create-post">
            <h2>Create a New Post</h2>
            <form action="add_post.php" method="POST">
                <textarea name="post_content" rows="8" placeholder="Write your post content here..." required></textarea>
                <button type="submit">Publish Post</button>
                <a href="forum.php">Cancel</a>
            </form>
        </div>

    </div>
</main>

<?php
// Handle post submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = new mysqli('localhost', 'root', '', 'user_profile_db');
    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['post_content'])) {
        $content = $conn->real_escape_string($_POST['post_content']);
        $sql = "INSERT INTO posts (content) VALUES ('$content')";
        if ($conn->query($sql) === TRUE) {
            header('Location: forum.php');
            exit();
        } else {
            echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }
    }

    $conn->close();
}
?>

<?php include('footer.php'); ?>

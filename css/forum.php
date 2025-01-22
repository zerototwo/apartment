<?php include('header.php'); ?>

<main>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .forum-container {
            max-width: 900px;
            margin: 30px auto;
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }
        .forum-post, .create-post {
            border: 1px solid #ddd;
            border-radius: 12px;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .forum-post h3, .create-post h2 {
            margin-bottom: 15px;
            color: #333;
        }
        .forum-post p {
            color: #555;
            line-height: 1.6;
        }
        .comment-box {
            margin-top: 15px;
            padding: 15px;
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #6c63ff;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #5146c8;
        }
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            resize: none;
            margin-top: 10px;
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
        .posts-list h2 {
            margin-bottom: 20px;
            color: #444;
        }
    </style>

    <div class="forum-container">

        <div class="create-post">
            <h2>Forum Homepage</h2>
            <a class="button" href="new_post.php">Create New Post</a>
        </div>

        <div class="posts-list">
            <h2>Posts and Comments</h2>
            <?php
            // Connect to the database
            $conn = new mysqli('localhost', 'root', '', 'user_profile_db');
            if ($conn->connect_error) {
                die("Database connection failed: " . $conn->connect_error);
            }

            // Generate sample data if empty
            $sample_sql = "SELECT COUNT(*) AS count FROM posts";
            $sample_result = $conn->query($sample_sql);
            $sample_count = $sample_result->fetch_assoc()['count'];
            if ($sample_count == 0) {
                $conn->query("INSERT INTO posts (content) VALUES ('Welcome to the forum! Feel free to share your thoughts.')");
                $conn->query("INSERT INTO posts (content) VALUES ('What are your thoughts on the new dorm policies?')");
                $conn->query("INSERT INTO comments (post_id, content) VALUES (1, 'This is really helpful! Thanks for starting this forum.')");
                $conn->query("INSERT INTO comments (post_id, content) VALUES (2, 'I think the policies need more flexibility.')");
            }

            // Fetch posts
            $sql = "SELECT * FROM posts ORDER BY created_at DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='forum-post'>";
                    echo "<h3>Post ID: " . $row['id'] . "</h3>";
                    echo "<p>" . $row['content'] . "</p>";
                    echo "<p><em>Posted on: " . $row['created_at'] . "</em></p>";

                    // Display comments
                    $comment_sql = "SELECT * FROM comments WHERE post_id = " . $row['id'] . " ORDER BY created_at ASC";
                    $comment_result = $conn->query($comment_sql);

                    if ($comment_result->num_rows > 0) {
                        echo "<div class='comment-box'>";
                        echo "<strong>Comments:</strong>";
                        while ($comment = $comment_result->fetch_assoc()) {
                            echo "<p><strong>Comment:</strong> " . $comment['content'] . "</p>";
                        }
                        echo "</div>";
                    }

                    // Comment form
                    echo "<form action='add_comment.php' method='POST'>";
                    echo "<input type='hidden' name='post_id' value='" . $row['id'] . "'>";
                    echo "<textarea name='comment_content' rows='2' placeholder='Write a comment...' required></textarea><br>";
                    echo "<button type='submit'>Submit Comment</button>";
                    echo "</form>";

                    echo "</div>";
                }
            } else {
                echo "<p>No posts available. Be the first to create one!</p>";
            }

            $conn->close();
            ?>
        </div>

    </div>
</main>


<!-- 页脚 -->
<?php include 'footer.php';?>
</body>
<script>
    // $(document).ready(function(){
    //     $('.news-carousel').slick({
    //         dots: true,
    //         autoplay: true,
    //         autoplaySpeed: 4000,
    //         slidesToShow: 1,
    //         adaptiveHeight: true
    //     });
    // });

    $(document).ready(function () {
        // 初始化Slick轮播图
        $('.news-carousel').slick({
            arrows: true,
            prevArrow: '<button class="slick-prev">&lt;</button>',
            nextArrow: '<button class="slick-next">&gt;</button>',
            dots: false,
            fade: true, /* 切换时渐隐渐显 */
            autoplay: false,
            infinite: true
        });

        // 缩略图点击事件：切换主图
        $('.thumbnail').on('mouseenter click', function () {
            let index = $(this).data('index');
            $('.news-carousel').slick('slickGoTo', index);
        });

        // 鼠标悬浮局部放大
        $('.zoomable').on('mousemove', function (e) {
            const offsetX = e.offsetX / $(this).width() * 100;
            const offsetY = e.offsetY / $(this).height() * 100;
            $(this).css('transform-origin', `${offsetX}% ${offsetY}%`);
            $(this).css('transform', 'scale(1.5)');
        }).on('mouseleave', function () {
            $(this).css('transform', 'scale(1)');
        });
    });
</script>
</html>

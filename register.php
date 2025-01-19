<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="logo-container">
    <div class="rotating-circles">
        <div class="circle circle-left"></div>
        <div class="circle circle-right"></div>
        <div class="circle circle-mid"></div>
    </div>
    <img src="pics/prologo.png" alt="Logo" class="logo">
</div>
<div class="form-container">
<!--    <h1>Register</h1>-->
<!--    <form action="#" method="POST">-->
<!--        <label for="username">Username:</label>-->
<!--        <input type="text" id="username" name="username" required>-->
<!--        <label for="email">Email:</label>-->
<!--        <input type="email" id="email" name="email" required>-->
<!--        <label for="password">Password:</label>-->
<!--        <input type="password" id="password" name="password" required>-->
<!--        <button type="submit">Sign up</button>-->
<!--    </form>-->
<!--    <p>Already have an account? <a href="login1.php">Log in here</a></p>-->
    <h1>Register</h1>
    <form action="register_handler.php" method="POST" enctype="multipart/form-data">
        <label for="userType">userType:</label>
        <select id="userType" name="userType" onchange="toggleUserType()">
            <option value="tenant">tenant</option>
            <option value="owner">owner</option>
        </select><br>
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm password" required>

<!--        <label for="avatar">Upload Avatar:</label>-->
<!--        <input type="file" id="avatar" name="avatar" accept="image/*" required>-->
        <div class="avatar-upload">
            <label for="avatar" class="custom-file-upload">
                <span>Choose Avatar</span>
            </label>
            <input type="file" id="avatar" name="avatar" accept="image/*" required>
        </div>



        <label for="captcha">Captcha:</label>
        <div class="captcha-container">
            <img id="captchaImage" src="generate_captcha.php" alt="Captcha">
            <button type="button" id="refreshCaptcha">Refresh</button>
        </div>
        <input type="text" id="captchaInput" name="captcha" placeholder="Enter the text above" required>



        <input type="submit" value="Register">
    </form>
    <a href="login.php">Have an account already?Log in!</a>
    <a href="index.php">Go back</a>
</div>

<script>

    function toggleUserType() {
        const userType = document.getElementById("userType").value;
        // const ownerFields = document.getElementById("ownerFields");
        //
        // // 如果选择房东，显示额外字段；否则隐藏
        // if (userType === "owner") {
        //     ownerFields.style.display = "block";
        // } else {
        //     ownerFields.style.display = "none";
        // }
    }
    // Refresh the CAPTCHA image
    $("#refreshCaptcha").on("click", function () {
        $("#captchaImage").attr("src", "generate_captcha.php?rand=" + Math.random());
    });

    // Validate CAPTCHA with AJAX
    $("#registerForm").on("submit", function (e) {
        e.preventDefault();
        const form = this;
        const captchaInput = $("#captchaInput").val();
        $.post("validate_captcha.php", { captcha: captchaInput }, function (response) {
            if (response.success) {
                form.submit(); // If CAPTCHA is correct, submit the form
            } else {
                alert("Incorrect CAPTCHA. Please try again.");
            }
        }, "json");
    });
</script>

</body>
</html>


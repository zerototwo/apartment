<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="logo-container">
    <div class="rotating-circles">
        <div class="circle admincircle-left"></div>
        <div class="circle admincircle-right"></div>
        <div class="circle admincircle-mid"></div>
    </div>
    <img src="pics/logo.png" alt="Logo" class="logo">
</div>
<div class="form-container">
    <!--    <h1>Login</h1>-->
    <!--    <form action="#" method="POST">-->
    <!--        <label for="email">Email:</label>-->
    <!--        <input type="email" id="email" name="email" required>-->
    <!--        <label for="password">Password:</label>-->
    <!--        <input type="password" id="password" name="password" required>-->
    <!--        <button type="submit">Log in</button>-->
    <!--    </form>-->
    <!--    <p>Don't have an account? <a href="register.php">Register here</a></p>-->
    <h1>Welcome,administrator</h1>
    <form>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
<!--        <input type="submit" value="Log in">-->
        <li><a href="receive_data.php">Admin login</a></li>
    </form>


</div>
</body>
</html>



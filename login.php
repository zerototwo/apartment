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
        <div class="circle circle-left"></div>
        <div class="circle circle-right"></div>
        <div class="circle circle-mid"></div>
    </div>
    <img src="pics/prologo.png" alt="Logo" class="logo">
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
    <h1>Log in</h1>
    <form action="login_handler.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Log in">
    </form>
    <a href="register.php">Don't have an account?Register!</a>
    <a href="index.php">Go back</a>
</div>
</body>
</html>


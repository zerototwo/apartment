<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
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
    <form action="register_handler.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm password" required>
        <input type="submit" value="Register">
    </form>
    <a href="login.php">Have an account already?Log in!</a>
    <a href="index.php">Go back</a>
</div>
</body>
</html>


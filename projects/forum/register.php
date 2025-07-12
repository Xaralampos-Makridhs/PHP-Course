<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, pass) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $pass);
    $stmt->execute();

    header("Location: login.php");
    exit;
}
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>Register</title>
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="register">
            <h2 class="registerh2">Register to Our Forum</h2>
            <form method="post" class="registerform">
                <p>Username</p>
                <input type="text" name="username" required placeholder="Enter your name...">
                <p>Password</p>
                <input type="password" name="pass" required placeholder="Password">
                
                <button type="submit" class="regbtn">
                    <i class="ri-login-box-line"></i>
                </button>
            </form>


            <a href="login.php" style="color:#0a0b5c;">Login</a>
        </div>
    </body>
</html>
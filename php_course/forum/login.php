<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['pass'];

    $stmt = $conn->prepare("SELECT id, pass FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($user_id, $hashed);

    if ($stmt->fetch() && password_verify($password, $hashed)) {
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit;
    } else {
        
        echo "<p class='msgerror'>Incorrect login details, try again!</p>";

    }
}
?>



<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Log In</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

        <div class="login">
            <h2 class="loginh2">Log In</h2>
            <form method="post" class="loginform">
                <p class="loginp">Username</p>
                <input type="text" name="username" placeholder="Enter your username...">
                <p class="loginp">Password</p>
                <input type="password" name="pass" placeholder="Enter your password...">
                <button type="submit" class="loginbtn">
                    <i class="ri-login-circle-line"></i>
                </button>
            </form>  
                <a href="register.php">
                    <button class="registerbtn">Register</button>
                </a>
 
        </div>     
    </body>
</html>
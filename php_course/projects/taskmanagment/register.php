<?php
    include 'config.php';

    if($_SERVER['REQUEST_METHOD']==='POST'){
        
        $username=trim($_POST['username']);
        $email=trim($_POST['email']);
        $password=password_hash($_POST['password'], PASSWORD_DEFAULT);

        $stmt=$conn->prepare("INSERT INTO users (username,email,password) VALUES (?,?,?)");
        $stmt->bind_param("sss",$username,$email,$password);
        $stmt->execute();

        header("Location: login.php");
        exit();
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
    </head>
    <body>
        <form action="" method="post">
            
            <p>Username</p>
            <input type="text" name="username" required>
            
            <p>Email</p>
            <input type="email" name="email" required>
            
            <p>Password</p>
            <input type="password" name="password" required>
            
            <button type="submit">Submit</button>
        </form>
        <p>Already Have an account?</p>
        <a href="login.php">Log In</a>
    </body>
</html>
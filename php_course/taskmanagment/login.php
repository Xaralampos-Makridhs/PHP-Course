<?php
    include 'config.php';

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $username=trim($_POST['username']);
        $password=$_POST['password'];

        $stmt=$conn->prepare("SELECT id, password FROM users WHERE username= ?");
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $stmt->bind_result($user_id,$hashed);

        if($stmt->fetch() && password_verify($password,$hashed)){
            $_SESSION['user_id']=$user_id;
            $_SESSION['username']=$username;

            header("Location: index.php");
            exit;
        }else{
            echo "<p>Wrong username or password</p>";
        }
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Log In</title>
    </head>
    <body>
        <form action="" method="post">
            
            <p>Username</p>
            <input type="text" name="username" required>
            
            <p>Password</p>
            <input type="password" name="password" required>
            <button type="submit">Submit</button>
        </form>
    </body>
    <a href="register.php">Register</a>
</html>
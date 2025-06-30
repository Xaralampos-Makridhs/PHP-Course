<?php
    session_start();
    include 'config.php';

    if($_SERVER["REQUEST_METHOD"]=='POST'){
        $username=trim($_POST['username']);
        $password=trim($_POST['password']);

        $stmt=$conn->prepare("SELECT id,password FROM users WHERE username=? ");
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows===1){
            $stmt->bind_result($user_id,$hashed_pass);
            $stmt->fetch();

            if(password_verify($password,$hashed_pass)){
                $_SESSION['user_id']=$user_id;
                $_SESSION['username']=$username;
                header("Location: dashboard.php");
                exit;
            }else{
                echo "<p>Wrong and/or password</p>";
            }
        }else{
            echo "<p>User not Found!</p>";
        }
    }
?>


<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">
        <link rel="stylesheet" href="style.css">
        <title>Log In</title>
    </head>
    <body>
        <div class="form">
            <form action="" method="post">
                <p>Username</p>
                <input type="text" name="username" required>
                <p>Password</p>
                <input type="password" name="password" required>
                <button type="submit" class="btn">
                    <p>Log In</p>
                    <i class="ri-login-circle-line"></i>
                </button>
            </form>
        </div>
        
    </body>
</html>
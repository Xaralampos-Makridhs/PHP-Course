<?php
    include 'config.php';

    if($_SERVER['REQUEST_METHOD']==='POST'){
        $username=trim($_POST['username']);
        $password=trim($_POST['password']);

        $stmt=$conn->prepare("SELECT id,password FROM users WHERE username=?");
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $stmt->bind_result($user_id,$hashed);

        if($stmt->fetch() && password_verify($password,$hashed)){
            $_SESSION['user_id']=$user_id;
            $_SESSION['username']=$username;
            header("Location:add_recipe.php");
            exit;
        }else{
            echo "Incorrect log in details";
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
    </head>
    <body>
        <form method="post" class="login-form">
            <h2>Log In</h2>

            <label for="username">Username</label>
            <input type="text" name="username">

            <label for="password">Password</label>
            <input type="password" name="password">

            <button type="submit">Log In</button>
        </form>
        <a href="index.php">Create Account</a>
    </body>
</html>
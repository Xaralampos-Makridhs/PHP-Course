<?php
    include 'config.php';

    if($_SERVER['REQUEST_METHOD']==='POST'){
        $username=trim($_POST['username']);
        $email=trim($_POST['email']);
        $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
        
        $stmt=$conn->prepare("INSERT INTO users (username,email,password) VALUES (?,?,?)");
        $stmt->bind_param("sss",$username,$email,$password);
        $stmt->execute();
        
        header("Location:login.php");
        exit();
    }
?>

<!doctype html>
<html>
   <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <!--Remix Icons-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">
        <!--Style-->
        <link rel="stylesheet" href="style.css">

        <title>Register-MyRecipeApp</title>
    </head>
    <body> 
            <form method="post">
            <h2>Create an Account</h2>

            <label for="username">Username</label>
            <input type="text" name="username" required>

            <label for="email">Email</label>
            <input type="email" name="email" required>

            <label for="password">Password</label>
            <input type="password" name="password" required>

            <button type="submit">
                <p>Rgister</p>
            </button>

            <a href="login.php">Already have an account? Sign in</a>
            </form>
    </body>
</html>
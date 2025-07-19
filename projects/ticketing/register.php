<?php
    include 'config.php';

    if($_SERVER['REQUEST_METHOD']==='POST'){
        //server side validation
        $errors=[];

        $username=trim($_POST['username'] ?? '');
        $email=trim($_POST['email']) ?? '';
        $password=$_POST['password'] ?? '';
        $confirm_password=$_POST['confirm_password'] ?? '';

        if(empty($username)){
            $errors[]="Username required";
        }

        if(empty($password)){
            $errors[]="Password required";
        }

        if(empty($email)){
            $errors[]="Email required";
        }

        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors[]="Invalid Email";
        }

        if(strlen($password)<6){
            $errors[]="Password must be at least 6 characters";
        }
    
        if($password!==$confirm_password){
            $errors[]="Passwords are not matching";
        }

        //Dublicate user

        if(empty($errors)){
            $stmt=$conn->prepare("SELECT id FROM users WHERE username=? OR email=?");
            $stmt->bind_param("ss",$username,$email);
            $stmt->execute();
            $stmt->store_result();

            if($stmt->num_rows>0){
                $errors[]="Username or email exists";
            }
            $stmt->close();
        }

        if(empty($errors)){
            
            $hashedpassword=password_hash($password, PASSWORD_DEFAULT);
            
            $stmt=$conn->prepare("INSERT INTO users (username,email,password) VALUES (?,?,?)");
            $stmt->bind_param("sss", $username,$email,$hashedpassword);

            if($stmt->execute()){
                header("Location: login.php");
                exit();
            }else{
                $errors[]="Database error". $stmt->error;
            }
        }
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

        <?php
            if(!empty($errors)){
                foreach($errors as $error){
                    echo "<p style='color:red;'>$error</p>"; 
                }
            }
        ?>

        <h1>Welcome</h1>

        <form action="" method="post">
            <p>Username</p>
            <input type="text" name="username" required>
            
            <p>Email</p>
            <input type="email" name="email" required>
            
            <p>Password</p>
            <input type="password" name="password" required>
            
            <p>Confirm Password</p>
            <input type="password" name="confirm_password" required>
            
            <input type="submit" value="submit">
        </form>
        <p>Already have an account?</p>
        <a href="login.php">Login</a>
    </body>
</html>
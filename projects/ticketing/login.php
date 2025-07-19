<?php
    include 'config.php';
    
    $errors=[];

    if($_SERVER['REQUEST_METHOD']==='POST'){

        $email=trim($_POST['email']);
        $password=$_POST['password'];

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

        $stmt=$conn->prepare("SELECT id,password,role FROM users WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result=$stmt->get_result();
        
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];

                header("Location: index.php");
                exit();
            } else {
                $errors[] = "Invalid credentials";
            }
        } else {
            $errors[] = "Invalid credentials";
        }
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Log in</title>
    </head>
    <body>

        <?php
            if(!empty($errors)){
                foreach($errors as $error){
                    echo "<p style='color:red;'>$error</p>"; 
                }
            }
        ?>
        <h1>Log In</h1>

        <form action="" method="post">
            
            <p>Email</p>
            <input type="email" name="email" required>

            <p>Password</p>
            <input type="password" name="password" required>

            <input type="submit" value="submit">
        </form>

        <a href="register.php">Create Account</a>
    </body>
</html>
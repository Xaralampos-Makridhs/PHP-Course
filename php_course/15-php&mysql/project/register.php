<?php
    $server="localhost";
    $name="root";
    $pass="xm180605";
    $dbname="user_system";

    //connection
    $connection=new mysqli($server, $name, $pass, $dbname);

    if($connection->connect_error){
        die("Connected Failed: ".$connection->connect_errno);
    }

    // POST method from the form
    $user = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashing password

   
    $sql = "INSERT INTO users (username, email, hashpaswword, created_at)
            VALUES ('$user', '$email', '$password', NOW())";

    if ($connection->query($sql) === TRUE) {
        echo "Registered Successfully";
    } else {
        echo "Error: " . $connection->error;
    }

    //close
    $connection->close();
?>

<?php
    $server="localhost";
    $name="root";
    $password="";//enter your password
    $db="auth";

    $conn=new mysqli($server,$name,$password,$db);
    if($conn->connect_error){
        die("Connect Failed: ". $conn->connect_error);
    }
?>

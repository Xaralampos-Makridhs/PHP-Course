<?php
    $server="localhost";
    $name="root";
    $pass="";
    $dbname="user_system";

    //connection
    try{
        $connection=new mysqli($server,$name,$pass);
        echo "Successfully connected!"."<br>";
    }catch(Exception $ev){
        exit("Connection Failed".$ev->getMessage());
    }

    //create db
    $sql="CREATE DATABASE IF NOT EXISTS user_system";
    
    if($connection->query($sql)===TRUE){
        echo "Data Base created successfully!"."<br>";
    }else{
        echo "Error creating the database"."<br>";
    }

    //select db
    $connection->select_db($dbname);

    //table

    $sql="CREATE TABLE IF NOT EXISTS users(
        id int(11) AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        email VARCHAR(60) NOT NULL,
        hashpaswword VARCHAR(100) NOT NULL,
        created_at TIMESTAMP
    )";

    if($connection->query($sql)===TRUE){
        echo "Table created succesfully!"."<br>";
    }else{
        echo "Error creating the table!"."<br>";
    }

    //close 
    $connection->close();

?>
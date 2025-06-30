<?php
    require 'config.php';

    $sql="CREATE TABLE IF NOT EXISTS users(
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(255) NOT NULL UNIQUE,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255)  NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    if($conn->query($sql)){
        echo "Table created Successfully";
    }else{
        echo "Error". $conn->error;
    }

?>
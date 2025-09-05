<?php
    $server='localhost';
    $name='root';
    $password=''; //Enter your own password
    $database='expenses';

    $conn=new mysqli($server,$name,$password,$database);

    if($conn->connect_error){
        die('Connection Failed'. $conn->connect_error);
    }

    $table='CREATE TABLE IF NOT EXISTS expenses(
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        category VARCHAR(100),
        amount DECIMAL(10,2) NOT NULL,
        expense_date DATE NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )';

    if($conn->query($table)=== FALSE){
        die('Table Creation Faield'. $conn->error);
    }

?>

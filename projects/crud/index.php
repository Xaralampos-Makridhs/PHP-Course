<?php
    require_once 'config.php';

    $sql="CREATE TABLE IF NOT EXISTS `".tablename."`(
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255)    
    )";

    if($conn->query($sql)){
        echo "Table Created Successfully.<br>";
    }else{
        echo "Table creation failed.<br>";
    }

    $conn->close();
?>

<a href="insert.php">Insert Data</a><br>
<a href="update.php">Update Data</a><br>
<a href="delete.php">Delete Data</a>
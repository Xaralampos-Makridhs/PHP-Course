<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="">
        <title>Insert Items</title>
    </head>
    <body>

    <?php
    $server="localhost";
    $name="root";
    $password="xm180605";
    $database="examplebase";

    //connection
    try{
        $connection=new mysqli($server,$name,$password);
        echo "Successfully Connected!"."<br>";
    }catch(Exception $ev){
        exit("Failed". $ev->getMessage());
    }

    //create table
    $sql="CREATE DATABASE IF NOT EXISTS examplebase";
    //check if database is created successfully

    if($connection->query($sql)===TRUE){
        echo "Database created Successfully"."<br>";
    }else{
        echo "Failed";
    }

    $connection->select_db($database);

    $sql= "CREATE TABLE myStudents(
        id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(20) NOT NULL,
        surname VARCHAR(20) NOT NULL,
        email VARCHAR(60),
        date_register TIMESTAMP
    )";

    try{
        if($connection->query($sql)){
            echo "Table created successfully"."<br>";
        }
    }catch(Exception $ev){
        echo "Failed: ". $ev->getMessage();
    }

    //Insert record
    $current_date=date('Y-m-d H:i:s');//current time to insert in the table
    $sql="INSERT INTO myStudents(firstname,surname,email,date_register)
          VALUES('Xaralampos','Makridhs','makridhs.xaralampos@gmail.com','$current_date')";
    
    //checks if the item inserted successfully
    if ($connection->query($sql) === TRUE) {
        echo "Record inserted successfully"."<br>";
    } else {
        echo "Failed to insert record: " . $connection->error . "<br>";
    }

    //close the connection
    $connection->close();
    ?>
        
    </body>
</html>
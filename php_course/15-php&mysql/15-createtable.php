<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Table</title>
    </head>
    <body>
        <?php
            $server="localhost";
            $name="root";
            $password="";
            $database="mydatabase";

            //connection
            try {
                $connection = new mysqli($server, $name, $password);
            }catch(Exception $ev) {
                exit("Connection failed: " . $ev->getMessage());
            }


            //create database
            $sql = "CREATE DATABASE IF NOT EXISTS mydatabase";//under conditional if not exists
    
            if ($connection->query($sql) === TRUE) {
                echo "Database created successfully!";
            }else{
                echo "Error creating database: " . $connection->error;
            }

            $connection->select_db($database);


            //table
            //int not negative numbres increases automatically UNIQUE(id) for every student
            //max 20 characters mandatory 
            //stores date and time
            $sql="CREATE TABLE students(
                id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                firstname VARCHAR(20) NOT NULL,
                surname VARCHAR(20) NOT NULL,
                email VARCHAR(20),
                date_register TIMESTAMP
            )";

            try{
                if($connection->query($sql)){
                    echo "Table created successfully";
                }
            }catch(Exception $ev){
                echo "Failed: ". $ev->getMessage();
            }

            //close
            $connection->close();



        ?>
    </body>
</html>
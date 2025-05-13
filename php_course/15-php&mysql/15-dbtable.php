<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DataBase Table|PHP</title>
    </head>
    <body>
        <?php
        // a database consists of a set of tables.
        //how to create a table

        $server="localhost";
        $name="root";
        $password="";
        $database="mydb";

        //connection
        try{
            $connection=new mysqli($server,$name,$password);
            echo "You connected sucesfully"."<br>";
        }catch(Exception $ev){
            exit("Failed: ". $ev->getMessage());
        }

        //create db
        $sql="CREATE DATABASE $database";
        try{
            if($connection->query($sql)){
                echo "Database created successfully";
            }
        }catch (Exception $ev){
            echo "Error creating database"."<br>";
        }

        //work here


        //close connection
        $connection->close();

        //put your password and run the file

        //procedular way to create db
        //just change the line 20 with  $connection = mysqli_connect($server, $name, $password);
        //and line 29 with if (mysqli_query($connection, $sql))

        //create db with pdo

            // Create connection
            try {
                $connection = new PDO("mysql:host=$server", $name, $password);
            } catch(PDOException $ev) {
                exit("Connection failed: " . $ev->getMessage());
            }

            //create database
            $sql = "CREATE DATABASE $database";
            try {
                if ($connection->query($sql)) echo "Database created successfully!";
            }catch(PDOException $ev) {
                echo "Error creating database: " . $ev->getMessage();
            }

            //work here

            // Close connection
            $conn = null;

            //have errors because we create th same db 2 times.
        ?>
        
    </body>
</html>
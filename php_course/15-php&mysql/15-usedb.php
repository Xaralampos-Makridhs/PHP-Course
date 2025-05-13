<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>USE Database</title>
    </head>
    <body>
    
    <?php
        $server="localhost";
        $name="root";
        $password="";
        $database="mydb";

        //connection

        try{
            $connection=new mysqli($server,$name,$password);
        }catch(Exception $ev){
            exit("Failed: ". $ev->getMessage());
        }
       
        //createdb
        $sql="CREATE DATABASE IF NOT EXISTS $database";
        try{
            if($connection->query($sql)){
                echo "Created Successfully";
            }
        }catch(Exception $ev){
            echo "Error creating database".$ev->getMessage();
        }

        //select the db
        $connection->select_db("mydb");

        //close
        $connection->close();
    ?>
        
    </body>
</html>
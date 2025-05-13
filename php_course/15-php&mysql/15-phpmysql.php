<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP and MySQL</title>
    </head>
    <body>
        <?php
            /*MySQL:
             It is a database management system(dbms) used on the internet.
             It is a database management system(dbms) that runs on a server.
             The data is stored in a table.
             PHP connects with MySQL with the extension MySQLi.
            */

            $server="localhost";
            $name="root";
            $password="";//put the password that you use in MySQL.(personally I use MySQL workbench)

            //connection
            try{
                $connection=new mysqli($server,$name,$password);
                //you can use mysqli_connect()
                echo "Connected Successfully!";
            }catch(Exception $ev){
                exit("Failed:". $ev->getMessage());
            }
            //if name and password are correct,a succesful connection message will appear.
            //oop closing
            $connection->close();//or mysqli.close($connection);

            //another way
            $server="localhost";
            $name="root";
            $password="";

            try{
                $connection=new PDO("mysql:host=$server",$name,$password);
                echo "Successfully";
            }catch (PDOException $ev){
                exit("Failed: ". $ev->getMessage());
            }
            //PDO close 
            $connection=null;
        ?>
        
    </body>
</html>
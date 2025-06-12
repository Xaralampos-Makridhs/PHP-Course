<?php
    define("servername","localhost");
    define("name","root");
    define("password","");//enter your own password
    define("tablename","crudtable");
    define("database","crud");

    //make sure you have create the Database in phpmyadmin
    try{
        $conn=new mysqli(servername,name,password,database);
        echo "Connection Created Succesfuly.<br>";
    }catch(mysqli_sql_exception $e){
        echo "Failed". $e->getMessage();
    }
?>
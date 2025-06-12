<?php
    require 'config.php';

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $name=$_POST["name"];

        if(!empty($name)){
            $stmt=$conn->prepare("INSERT INTO `".tablename."` (name) VALUES (?)");
            if($stmt){
                $stmt->bind_param("s",$name);
                if($stmt->execute()){
                    echo "Insert Done.<br>";
                }else{
                    echo "Failed.<br>";
                }
                $stmt->close();
            }else{
                echo "Error during creation sql query .<br>";
            }
        }else{
            echo "Name cannot be empty.<br>";
        }

        $result=$conn->query("SELECT COUNT(*) AS count FROM `".tablename."`");
        if($result){
            $row=$result->fetch_assoc();
            echo "Total inserts: ". $row['count']. "<br>";
        }
    }
    $conn->close();
?>

<!--Form-->
<form method="post" action="">
    Name: <input type="text" name="name">
    <input type="submit" value="Submit">
</form>

<a href="index.php">HomePage</a>
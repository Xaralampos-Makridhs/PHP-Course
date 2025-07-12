<?php
    require 'config.php';

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $id=$_POST["id"];
        $name=$_POST["name"];

        $stmt=$conn->prepare("UPDATE `".tablename."` SET name=? WHERE id=?");
        $stmt->bind_param("si",$name,$id);

        if($stmt->execute()){
            if($stmt->affected_rows>0){
                echo "Updated Successfully.<br>";
            }else{
                echo "Not Updated.<br>";
            }
        }else{
            echo "Error during update". $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
?>

<!--Form-->
<h2>Update Form</h2>
<form method="post" action="">
    ID: <input type="number" name="id" required>
    New Name: <input type="text" name="name" required>
    <input type="submit" value="Submit">
</form>

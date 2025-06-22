<?php
    require_once 'config.php';

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $id=intval($_POST['id']);
        $stmt=$conn->prepare("DELETE FROM `".tablename."` WHERE id=?");
        if($stmt){
            $stmt->bind_param("i",$id);
            if($stmt->execute()){
                if($stmt->affected_rows>0){
                    echo "Deleted Successfully.<br>";
                }else{
                    echo "ID not Found";
                }
            }else{
                echo "Error during execution.<br>";
            }

            $stmt->close();

        }else{
            echo "Prepared Failed".$conn->error."<br>";
        }

    }
    $conn->close();
?>


<h2>Delete Form</h2>
<form method="post" action="">
    Enter ID for delete: <input type="text" name="id" required>
    <input type="submit" value="Delete">
</form>

<a href="index.php">Home Page</a>

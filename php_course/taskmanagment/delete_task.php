<?php
    include 'config.php';

    if(!isset($_SESSION['user_id'])){
        header("Location: logout.php");
    }

    $id=(int)$_GET['id'];
    $user_id=$_SESSION['user_id'];

    $stmt=$conn->prepare("DELETE FROM tasks WHERE id=? AND user_id=?");
    $stmt->bind_param("ii",$id,$user_id);
    
    if($stmt->execute()){
        echo "<p>Task Deleted Successfully</p>";
        header("Location: index.php");
        exit;
    }else{
        echo "<p>Error deleting task</p>";
    }
?>
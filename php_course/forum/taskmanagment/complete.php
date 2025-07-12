<?php
    include 'config.php';

    if(!isset($_SESSION['user_id'])){
        header("Location: logout.php");
    }

    $task_id=(int)$_GET['id'];
    $user_id=$_SESSION['user_id'];

    $stmt=$conn->prepare("SELECT id FROM tasks WHERE id=? AND user_id=?");
    $stmt->bind_param("ii",$task_id,$user_id);
    $stmt->execute();
    $result=$stmt->get_result();

    if($result->num_rows===0){
        die("Task didn't found");
    }

    $updatestmt=$conn->prepare("UPDATE tasks SET is_completed=1 WHERE id=? AND user_id=?");
    $updatestmt->bind_param("ii",$task_id,$user_id);
    $updatestmt->execute();

    header("Location: index.php");
?>


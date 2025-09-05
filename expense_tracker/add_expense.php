<?php
    include 'config.php';

    $title=$_POST['title'];
    $category=$_POST['category'];
    $amount=$_POST['amount'];
    $date=$_POST['expense_date'];

    $stmt=$conn->prepare('INSERT INTO expenses(title,category,amount,expense_date) VALUES (? , ? , ? , ?)');
    $stmt->bind_param('ssds',$title,$category,$amount,$date);

    if($stmt->execute()){
        header('Location:index.php');
        exit();
    }else{
        echo 'Error'. $stmt->error;
    }

    $stmt->close();
?>
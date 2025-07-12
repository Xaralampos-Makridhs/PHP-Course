<?php
    include 'config.php';

    if(!isset($_SESSION['user_id'])){
        header("Location: logout.php");
        exit;
    }

    if($_SERVER['REQUEST_METHOD']==='POST'){
        
        $title=trim($_POST['title']);
        $description=$_POST['description'];
        $user_id=$_SESSION['user_id'];

        $stmt=$conn->prepare("INSERT INTO tasks (title,description, user_id) VALUES (?,?,?)");
        $stmt->bind_param("ssi", $title,$description, $user_id);

        if($stmt->execute()){
            echo "<p>Task added succsessfully</p>";
        }
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Task</title>
    </head>
    <body>
        <form action="" method="post">
            
            <p>Title</p>
            <input type="text" name="title" required>
            
            <p>Description</p>
            <textarea name="description" placeholder="Type here..." required></textarea>

            <button type="submit">Submit</button>
        </form>
        <a href="logout.php">Log out</a>
        <a href="index.php">See my Tasks</a>
    </body>
</html>
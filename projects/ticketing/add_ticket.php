<?php
    include 'config.php';

    $errors=[];

    if(!isset($_SESSION['user_id'])){
        header("Location: login.php");
        exit;
    }
    
    $user_id=$_SESSION['user_id'];

    if($_SERVER['REQUEST_METHOD']==='POST'){
        $title=trim($_POST['title']);
        $description=$_POST['description'];

        if(empty($title)){
            $errors[]="Title required";
        }

        if(empty($description)){
            $errors[]="Description is required";
        }
        
        if(empty($errors)){
            $stmt=$conn->prepare("INSERT INTO ticket (title,description,user_id, status,created_at) VALUES (?,?,?,'open',NOW())");
            $stmt->bind_param("ssi",$title,$description,$user_id);
        
            if($stmt->execute()){
                header("Location: index.php");
                exit;
            }else{
                $errors[]="Failed to add";
            }
            $stmt->close();
        }
    }
?>


<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Ticket</title>
    </head>
    <body>
        <?php if(!empty($errors)): ?>
            <ul style="color:red;">
                <?php foreach($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <h1>Add a new Ticket</h1>

        <form action="" method="post">
            
            <p>Title</p>
            <input type="text" name="title" required>

            <p>Description</p>
            <textarea type="text" name="description"></textarea>

            <input type="submit" value="submit">
        </form>
        <a href="dashboard.php">Dashboard</a>
        <a href="logout.php">Log out</a>
    </body>
</html>
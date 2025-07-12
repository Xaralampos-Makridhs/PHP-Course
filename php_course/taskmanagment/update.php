<?php
    include 'config.php';

    if(!isset($_SESSION['user_id'])){
        header("Location:logout.php");
        exit;
    }

    $id=(int)$_GET['id'];
    $user_id=$_SESSION['user_id'];

    $stmt = $conn->prepare("SELECT title, description, is_completed FROM tasks WHERE user_id = ? AND id = ?");
    $stmt->bind_param("ii", $user_id, $id);
    $stmt->execute();

    $result=$stmt->get_result();

    if($result->num_rows===0){
        exit('Task not found');
    }

    $task=$result->fetch_assoc();

    $title = $task['title'];
    $description = $task['description'];
    $is_completed = $task['is_completed'];

    if($_SERVER['REQUEST_METHOD']==='POST'){
        $title=trim($_POST['title']);
        $description=$_POST['description'];
        $is_completed=isset($_POST['is_completed'])? 1:0;

        $stmt = $conn->prepare("UPDATE tasks SET title = ?, description = ?, is_completed = ? WHERE user_id = ? AND id = ?");
        $stmt->bind_param("ssiii", $title, $description, $is_completed, $user_id, $id);
        if($stmt->execute()){
            header("Location: index.php");
            exit;
        }else{
            echo "<p>Error</p>";
        }
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update</title>
    </head>
    <body>
        <form action="" method="post">
            
            <p>Title</p>
            <input type="text" name="title" value="<?php echo htmlspecialchars($title); ?>" required>

            <p>Description</p>
            <textarea name="description" placeholder="Type here..." required><?php echo htmlspecialchars($description); ?></textarea>

            <p>Completed</p>
            <input type="checkbox" name="is_completed" value="1"<?php if($is_completed) echo 'checked'; ?>>

            <button type="submit">Submit</button>

        </form>       
    </body>
</html>
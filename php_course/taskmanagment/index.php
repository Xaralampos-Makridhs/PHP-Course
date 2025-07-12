<?php
    include 'config.php';

    if(!isset($_SESSION['user_id'])){
        header("Location: logout.php");
        exit;
    }

    $user_id=$_SESSION['user_id'];

    $stmt=$conn->prepare("SELECT * FROM tasks WHERE user_id=? ORDER BY created_at DESC");
    $stmt->bind_param("i",$user_id);
    $stmt->execute();

    $result=$stmt->get_result();
?>



<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">
        <title>MyTasks</title>
    </head>
    <body>
        <h1><?php echo htmlspecialchars($_SESSION['username']); ?> Tasks</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Situation</th>
                    <th>Date</th>
                    <th>Activities</th>
                </tr>       
            </thead>
            <tbody>
                <?php while($row=$result->fetch_assoc()):?>
                    <tr class="<?php echo $row['is_completed']? 'completed': '';?>">
                        <td> <?php echo htmlspecialchars($row['title']); ?></td>
                        <td> <?php echo nl2br(htmlspecialchars($row['description'])); ?> </td>
                        <td> <?php echo $row['is_completed']? 'Completed': 'pending'; ?></td>
                        <td> <?php echo $row['created_at']; ?></td>   
                        <td class="actions">
                            <?php if(!$row['is_completed']):?>
                            <a href="complete.php?id=<?php echo $row['id']; ?>" class='btn'>
                                <i class="ri-check-double-line"></i>
                            </a>
                            <?php endif; ?>
                                
                            <a href="update.php?id=<?php echo $row['id']; ?>" class="btn"> <i class="ri-edit-line"></i> </a>
                            <a href="delete_task.php?id=<?php echo $row['id']; ?>" class="btn" onclick="return confirm('Are you sure?')"> <i class="ri-close-line"></i> </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="create_task.php">Create Task</a>
        <a href="logout.php">Log out</a>
    </body>
</html>
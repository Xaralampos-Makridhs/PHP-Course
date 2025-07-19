<?php
    include 'config.php';

    if(!isset($_SESSION['user_id'])){
        header("Location: login.php");
        exit();
    }

    $user_id=$_SESSION['user_id'];
    $user_role=$_SESSION['role'] ?? 'user';


    if($user_role==='admin'){

        $stmt=$conn->prepare("SELECT * FROM ticket ORDER BY created_at DESC");
        $stmt->execute();
        $tickets=$stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        $stmt->close();
    }else{
        //if it is user display only his tickets
        $stmt=$conn->prepare("SELECT * FROM ticket WHERE user_id=? ORDER BY created_at DESC");
        $stmt->bind_param("i",$user_id);
        $stmt->execute();
        $tickets=$stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
    </head>
    <body>
        <?php if(empty($tickets)): ?>
            <p>Tickets Not Found</p>
        <?php else: ?>
            <table border="1" cellpadding="5" cellspacing="0" >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Date</th>
                        <?php if($user_role==='admin'): ?>
                            <th>Actions</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($tickets as $ticket):?>
                        <tr>
                            <td> <?php echo htmlspecialchars($ticket['id']); ?></td>
                            <td> <?php echo htmlspecialchars($ticket['title']); ?> </td>
                            <td> <?php echo htmlspecialchars($ticket['status']);?> </td>
                            <td> <?php echo htmlspecialchars($ticket['created_at']); ?></td>
                            <?php if($user_role==='admin'): ?>
                                <td><a href="edit_ticket.php?id=<?php echo $ticket['id']; ?>">Edit ICON</a> |
                                    <a href="delete_ticket.php?id=<?php echo $ticket['id']; ?>" onclick="return confirm('Are you sure?')">Delete ICON</a></td>
                            <?php endif?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif;?>
        <a href="add_ticket.php">Add Ticket</a>
        <a href="logout.php">Log Out</a>
    </body>
</html>
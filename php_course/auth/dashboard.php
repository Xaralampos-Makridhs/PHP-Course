<?php
    session_start();

    if(!isset($_SESSION['user_id'])){
        header("Location:login.php");
        exit;
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">
        <link rel="stylesheet" href="style.css">
        <title>Dashboard</title>
    </head>
    <body>
        <div class="container">
            <h2>Welcome <?php echo $_SESSION['username']; ?>!</h2>
            <a href="logout.php">Log Out</a>
        </div>
    </body>
</html>

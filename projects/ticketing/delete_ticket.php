<?php
    include 'config.php';

    if(!isset($_SESSION['user_id'])){
        header("Location: login.php");
        exit;
    }

    $user_id=$_SESSION['user_id'];
    $user_role=$_SESSION['role'];

    $ticket_id=$_GET['id'] ?? null;

    if(!$ticket_id){
        echo "Ticket ID missing";
        exit;
    }

    if($user_role==='admin'){
        $stmt=$conn->prepare("DELETE FROM ticket WHERE id=?");
        $stmt->bind_param("i",$ticket_id);
        $stmt->execute();
        $stmt->close();
        header("Location: index.php");
        exit;
    }

    $stmt=$conn->prepare("SELECT user_id FROM ticket WHERE id=?");
    $stmt->bind_param("i",$ticket_id);
    $stmt->execute();

    $result=$stmt->get_result();
    $ticket=$result->fetch_assoc();

    if (!$ticket) {
        echo "<p>Ticket not found.</p>";
        exit;
    }


    if($ticket && $ticket['user_id']==$user_id){
        $stmt = $conn->prepare("DELETE FROM ticket WHERE id = ?");
        $stmt->bind_param("i", $ticket_id);
        $stmt->execute();
        $stmt->close();
        header("Location: index.php");
        exit;
    }else{
        echo "<p>Acces denied.You can't delete this ticket</p>";
        exit;
    }
?>
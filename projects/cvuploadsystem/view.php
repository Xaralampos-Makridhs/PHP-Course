<?php 
    include 'config.php';
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CV View</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

    <h2>CVs</h2>

    <?php
    $result=$conn->query("SELECT * FROM applications ORDER BY submitted_at DESC");

    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            echo "<div class='cventry'>";
            echo "<div class=infos>";
            echo "<strong>".htmlspecialchars($row['name'])."</strong> (".htmlspecialchars($row['email']).")<br>";
            echo "<a href='">htmlspecialchars($row['cv_path'])."'target=_blank'>Download CV</a>";
            echo "<p class='date'>Uploaded: " . $row['submitted_at'] . "</p>";
            echo "</div>"; 
            echo "</div>";
        }
    }else{
        echo "<p>No CVs yet</p>";
    }
    ?>

    <div class="end">
        <a href="index.php">Upload</a>
    </div>
        
    </body>
</html>
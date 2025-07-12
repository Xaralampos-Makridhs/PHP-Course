<?php
    require 'config.php';

    $sql="SELECT id, name FROM `".tablename."`";
    $result=$conn->query($sql);

    if($result && $result->num_rows>0){
        while($row=$result->fetch_assoc()){
            echo "ID: ".$row['id']."-Name:". htmlspecialchars($row['name'])."<br>";
        }
    }else{
        echo "Table doesn't have entries.<br>";
    }

    $conn->close();
?>
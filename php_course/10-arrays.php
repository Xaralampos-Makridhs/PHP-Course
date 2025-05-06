<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <title>Arrays</title>
    </head>
    <body>
<?php
    //INDEX ARRAY
    $cars1=array("Volvo","BMW","Toyota"); 

    echo "I like".$cars1[0].",".$cars1[1].",".$cars1[2]."<br>";

    echo "There are ".count($cars1)."in the array<br>";//counts the array elements
    
    //To access all the values of an array with indices, you can use a loop.
    for($i=0;$i<count($cars1);$i++){
        echo $cars1[$i]."<br>";

    }

    //ASSOCIATIVE ARRAYS
    $age2=array("Phoebe"=>"35","Chandler"=>"40","Joey"=>"39");
    echo "Phoebe is". $age2['Phoebe']."years old <br>.";

    //To access all the values of an associative array we use for-each
    foreach($age2 as $key=>$value){
        echo $key."is".$value."years old";//$key=Phoebe $value=35
    }

    //2D Arrays
    //brand,sell,stock
    $cars3=array(array("Volvo",22,18),array("BMW",10,10));
    /*echo $cars[0][0] . ": In stock: " . $cars[0][1] . ", sold: " . $cars[0][2] . ".<br>";
    echo $cars[1][0] . ": In stock: " . $cars[1][1] . ", sold: " . $cars[1][2] . ".<br>";*/

    for($i=0;$i<count($cars3);$i++){
        echo $cars3[$i][0] . ": In stock: " . $cars3[$i][1] . ", sold: " . $cars3[$i][2] . ".<br>";
    }

    sort($cars1);//sort ascending order
    rsort($cars1);//sort descending order

    asort($age2);//sort by the value ascending order
    arsort($age2);//sort by the value descending order

    ksort($age2);//sort by the key ascending order
    krsort($age2)//sort by the key descending order



?>

    </body>
<html></html>
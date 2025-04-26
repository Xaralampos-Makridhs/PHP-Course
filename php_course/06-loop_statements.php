<!DOCTYPE html>
<html>
    <body>
<?php
    $x=1;

    while($x<=5){
        echo "The number is: $x <br>";
        $x++;/*increase the value in the statement
        ,beacause there is danger 
        for infinity loop*/
    }

    $y=6;

    do{
        echo "The number is: $y<br>";
        $y++;
    }while($x<=5);/*this loop is going to execute at least one time 
    because the statement checks 
    in the end of the loop */

    /* for(initialize counter;expression evaluation;incremenet counter) */
    for($i;$i<=50;$i++){
        echo "The number is: $i<br>";
    } 

    /* for each is only for arrays
       foreach($array as $keyvalue)  */

       $colors=array("red","green","blue","yellow");

       foreach($colors as $value){
        echo "The color is: $value<br>";
       }

       

?>
    </body>
</html>
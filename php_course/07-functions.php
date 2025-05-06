<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Functions</title>
    </head>
    <body>
<?php
    // function functionname(parametre1,parametre2....)

    function writeMsg(){
        echo "Hello World!<br>";
    }

    //function call
    writeMsg();

    function fullName($name){
        echo "$name Papadopoulos<br>";
    }

    fullName("Hercules");
    fullName("Hera");
    fullName("Heron");

    /*we can also define a variable
    as a parametre of a function*/

    function setHeight($height=170){
        echo "The applicant's height is:$height cm.<br>";
    }

    setHeight(180);//output 180
    setHeight();//output 170
    setHeight(165);//output 165

    //a function can return a value
    function sum($sum1,$sum2){
        $sum3=$sum1+$sum2;
        return $sum3;
    }

    echo "5+10= ".sum(5,10)."<br>";
    echo "7+13= ".sum(7,13)."<br>";









?>
    </body>
</html>

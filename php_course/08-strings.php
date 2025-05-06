<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Strings</title>
    </head>
    <body>
<?php
    $x=strlen("Hello World!");//counts the number of characters
    echo $x."<br>";

    $y=str_word_count("Hello World!");//couns the number of words
    echo $y."<br>";
    
    $z=strrev("elddir ym si siht skcub net rof");//reverse the string
    echo $z."<br>";

    $a=strpos("Hello World","World");//haystack and needle
    echo $a."<br>";

    /*The first parameter is the word to be replaced
    , the second is the word that will take its place
    , and the third is the original string.
    */ 
    $b=str_replace("world","Dolly","Hello world");
    echo $b."<br>";
?>
    </body>
<html></html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        h1{
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-weight: 700;
            color:purple;
        }
    </style>
</head>
<h1>Basic Syntax.</h1>
<body>
    <?php
     /*This is the php tag,
    from this point until the tag closes
     the php commands are written*/

     //single line comments
     /*multi line comments*/


    echo "Hello World!";
    echo "<br>"; //break tag (next line)
    echo "Welcome to the PHP Script!"; //this is the output command
    echo"<br>";

    echo "----------------------------- <br>";
    print("Hello world!");
    echo "<br>";


    /*echo
    Faster
    Doesn’t return a value
    Can take multiple arguments

    print
    Always returns 1
    Takes only one argument
    Slightly slower
    */
    echo "----------------------------- <br>";

    echo "Concatenation String (.)";//if you want to make bolder a title use <h1> header tag
    echo "<br>";

    $firstname="Xarhs";
    $lastname="Makridhs";

    echo $firstname." ".$lastname;
    echo "<br>";
    echo "----------------------------- <br>";
   //end of php code ?>
</body>
</html>
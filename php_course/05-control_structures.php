<!DOCTYPE html>
<html>
    <body>
<?php
    date_default_timezone_set('Europe/Athens');//set timezone
    $t = date('H');//function to get the time in(00 23)

    if (($t>=6) and ($t<8)) {
        echo "It's early in the morning";
    }

    /*It checks if the time is after the 18:00
    That is, if the time is after 18:00.
    If the condition is true, it displays the message:
    "Have a good day"else displays the message:Have a good afternoon. */

    if ($t<18) {
        echo "Have a good day";
    } else {
        echo "Have a good afternoon";
    }

    $favcolor = "red";

    if ($favcolor == "red") {
        echo "Your favorite color is red!";
    } elseif ($favcolor == "blue") {
        echo "Your favorite color is blue!";
    } elseif ($favcolor == "green") {
        echo "Your favorite color is green!";
    } else {
        echo "Your favorite color is neither red, blue, or green!";
    }

    switch($favcolor){
        case "red":
            echo "Your favorite color is red!";
            break;
        case "blue":
            echo "Your favorite color is blue!";
            break;
        case "green":
            echo "Your favorite color is green!";
            break;
        default:
            echo "Your favorite color is neither red, blue, or green!";
    }


?>
    </body>
</html>
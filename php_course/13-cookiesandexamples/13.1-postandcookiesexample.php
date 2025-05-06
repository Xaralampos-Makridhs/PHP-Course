<?php

        $default_color='white';
        $cookie_name = 'bg_cookie';

        if(isset($_POST['color'])){//from the select name=...
            $selected_color=$_POST['color'];
            setcookie($cookie_name,$selected_color,time()+3600,"/");
            $default_color=$selected_color;
        }elseif (isset($_COOKIE['bg_cookie'])){
            $default_color=$_COOKIE['bg_cookie'];//previous choice of the user
        }


?>


<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="">
        <title>Example|POST AND COOKIES</title>
    </head>

    <body style="background-color: <?=htmlspecialchars($default_color)?>;">
        <h2>Choose Background color!</h2>
        <form method="post" action="">
            <select name="color"> <!-- post gets the name-->
                <option value="white">White</option>
                <option value="lightblue">Lightblue</option>
                <option value="red">Red</option>
                <option value="yellow">Yellow</option>
            </select>
            <button type="submit">Submit</button>
        </form>

        <p>Your background color is: <strong><?= htmlspecialchars($default_color)?></strong></p>
        
    </body>
</html>
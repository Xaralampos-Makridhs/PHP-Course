<!doctype html>

    <?php
        session_start(); //continues the previous session
    ?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sessions2|PHP</title>
    </head>
    <body>
        <?php
            //echo sessions from previous web page
            //you must run this page to see the echos
            echo $_SESSION["username"].",<br>";
            echo "your fav color is ". $_SESSION["favcolor"]."<br>";
            echo "your favoriteanimal is ".$_SESSION["animal"]."<br>";
        ?>
        
    </body>
</html>
<!doctype html>
<html>
    <head>
        <title>Get method</title>
        <meta charset="utf-8">
    </head>
    <body>
        <p>
            <?php
                echo $_GET["name"];
                echo "<br>";
                echo "Content will be delivered to your email:". $_GET["email"];

            ?>
        </p>
    </body>
</html>
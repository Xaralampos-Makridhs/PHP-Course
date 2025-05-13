<!doctype html>
    <?php
         session_start(); //starts the session
         //The function session_start() must appear in the script before any HTML tags.

         /*In PHP, a session is a way to store data for a user while they navigate through different pages of a website.*/
    ?>


<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sessions|PHP</title>
    </head>
    <body>
        <?php
            //set variables for the session
            $_SESSION["username"]="Giannis";
            $_SESSION["favcolor"]="Blue";
            $_SESSION["animal"]="cat";

            echo "Session variables are set.";

            //if you want to see all the variable prices in a session use var_dump()
            var_dump($_SESSION);
            //if you want to change a session variable,overwrite it

            $_SESSION["favcolor"]="yellow";
            var_dump($_SESSION);

            //if you want to delete all the variables 
            session_unset();

            //if you want to destroy the session
            session_destroy();
            //session destroyed
        ?>
        
    </body>
</html>
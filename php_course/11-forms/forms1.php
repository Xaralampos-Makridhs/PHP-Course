<!doctype html>
<html>
    <head>
        <title>Welcome|Forms </title>
        <meta charset="utf-8">
        
    </head>
    <body>
        <form method="get" action="welcome1.php"> <!--we will use the php method GET in the file welcome1.php -->
            <p>Enter your name: <input type="text" name="name" required></p>
            <p>Enter your email: <input type="email" name="email" required></p>
            <p><input type="submit" value="Subscribe"></p>
        </form>
<!-- The  post method is the same but your input values doesnt appear in the URL like the get method.
     If you want to choose post method just change method="post"-->
    </body>
</html>
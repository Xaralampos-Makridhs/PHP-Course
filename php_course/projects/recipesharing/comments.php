<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <a href="likes.php?id=<?php echo $recipe_id ?>" class="likebtn">
            <!--Icon-->
        </a>

        <p>
            <?php echo $likescount?>
                <!--Icon-->
        </p>
    </body>
</html>
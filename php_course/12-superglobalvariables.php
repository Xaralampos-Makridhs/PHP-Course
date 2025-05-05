<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <?php
            //$GLOBALS acces in global variables
            $x=10;
            $y=5;

            function addition(){
                $GLOBALS['z']=$GLOBALS['x'] + $GLOBALS['y'];
            }

            addition();

            echo $z,"<br>"; //outputs 15

            //$_SERVER has infos about browser and website
            echo $_SERVER['PHP_SELF']."<br><br>";//path
            echo $_SERVER['SERVER_SOFTWARE']."<br><br>";// id of browser for example apache
            echo $_SERVER['HTTP_HOST']."<br><br>";//head of the browser (localhost)
            echo $_SERVER['SERVER_PORT']."<br><br>";//80 protocol
            echo $_SERVER['SCRIPT_NAME']."<br><br>";//name of the script/path
            echo $_SERVER['HTTP_USER_AGENT']."<br><br>";//name of the browser
        ?>

        <!--example of $_GET-->

        <a href="test-get.php?subject=PHP%school-SoIS,DAI">Test $_GET</a>
        <br><br>
        <!--in the test-get.php $_GET['subject'] is the subject=... and 
        $_GET['school'] is school=... -->
        
        <form method="post">
            Name: <input type="name" name="fname">
            <input type="submit">
        </form>
        
        
        <?php
            //$_POST

            if($_SERVER["REQUEST_METHOD"]=='POST'){
                //collect value of input
                $name=$_POST['fname'];
                echo "<br>";
                if(empty($_POST['fname'])){
                    echo "Name is Empty";
                }else{
                    echo "Your name is: ". $name;
                }
            }

        ?>
        <?php
            //has error because 2 methods tryies to execute with 2 different methods
            if ($_SERVER["REQUEST_METHOD"]=='POST'){
                $name=$_REQUEST['fname'];//request gets infos from get post and cookies
                if(empty($_REQUEST['fname'])){
                    echo "Your name is empty!";
                }else{
                    echo "Your name is: ".$name;//outputs the name

                }
            }
        ?>

        


            
    </body>
</html>
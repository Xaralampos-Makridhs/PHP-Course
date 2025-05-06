<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Variable scope</title>
    </head>
    <body>
        <?php
            $x=5;//global scope

            function myTest(){
                $y = 10; // local scope
                echo "<p>Test variables inside the function:</p>";
                echo "Variable x is: $x";
                /* It has an error because 
                the global variable is not declared inside 
                the function but in the main program.
                */
                echo "<br>";
                echo "Variable y is: $y";
            }

            myTest();

            echo "<p>Test variables outside the function:</p>";
            echo "Variable x is: $x";
            echo "<br>";
            echo "Variable y is: $y";

            $a = 5;
            $b = 10;
            function mySecondTest() {
                global $a,$b;/*The global keyword 
                is used to access a global variable 
                from within a function.*/
                $b = $a + $a;
            }
        
            mySecondTest();
        
            echo $y; // outputs 15


            echo "Global System.";
            echo "<br>";

            /* 
            PHP stores all global variables in a global system variable.
            This variable is an associative array and is called $GLOBALS.
            */

            $c = 5;
            $d = 10;
        
            function myThirdTest() {
                $GLOBALS['d'] = $GLOBALS['c'] + $GLOBALS['d'];
            }
        
            myTest();
        
            echo $d; // outputs 15

            echo "Static variable.";

            function myFourthTest() {
                static $e = 0;/* 
                Normally, when a function finishes executing,
                 all of its variables are deleted.
                However, sometimes you want a local variable not to be deleted, 
                because you will need it later.
                */
                echo $e;
                $e++;
            }
        
            myFourthTest();
            echo "<br>";
            

            echo "Constants";

            define("GREETING", "Welcome");//first parametre constant name and the second is value.

            function myFifthTest() {
                echo GREETING;
            }
        ?>
    </body>
</html>
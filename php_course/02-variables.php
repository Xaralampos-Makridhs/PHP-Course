<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables and Data Types.</title>
    <style>
        h1{
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-weight: 700;
            color:purple;
        }
        
    </style>
</head>
<body>
   <h1>Variables and Data Types!</h1>
   <h2>Variable Naming Rules in PHP.</h2>
   <p> 1.Every PHP variable must begin with a dollar sign ($), followed by the name of the variable.</p>
    <p>2.Variable names must start with a letter (a–z, A–Z) or an underscore (_). They cannot start with a number or any other symbol.</p>
    <p>3.The preferred convention in PHP is to use camelCase for variable names that consist of multiple words. This means the first word is lowercase and every subsequent word starts with an uppercase letter.</p>
    <p>4.Variable names should clearly describe the data they hold. Avoid using single-letter or overly abbreviated names unless they are commonly accepted.</p>
    <p>5.You should not use reserved words (such as class, function, echo, null) as variable names, as it can cause unexpected behavior or errors.</p>
    <p>6.In PHP, $name, $Name, and $NAME are all different variables.(Case Sensitive)</p>
    <h2>Variables and data types</h2>
    <?php
        $x=5985;//int
        var_dump($x);/*this function returns
         the value and the variable type*/
        echo "<br>";

        $y=0x8c;//hexadecimal int.
        var_dump($y);
        echo "<br>";

        $z="hello world";//string
        var_dump($z);//(11) number of characters
        echo "<br>";

        $a=3.14;//float or double
        var_dump($a);
        echo "<br>";

        $isNegative=false;//boolean
        var_dump($isNegative);
        echo "<br>";

        $user=null;//null
        var_dump($user);
        echo "<br>";

        $colors = ["red", "green"];//array
        var_dump($colors);
        echo "<br>";

        //Object

        class Car{
            public $brand="Toyota";

            public function CarInfo(){
                return $this->brand."Yaris.";
            }
        }

        $mycar=new Car();
        var_dump($mycar);
        echo"<br";

        echo $mycar->CarInfo();

        /*
        In the next chapter
        we will deal with 
        object-oriented programming.
        */
    ?>
</body>
</html>
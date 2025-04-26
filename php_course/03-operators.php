<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Operators</title>
    
</head>
<body>

<table border="1">
    <caption>Arithmetic Operators</caption>
    <thead>
        <tr>
            <th>Operator</th>
            <th>Description</th>
            <th>Example</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>+</td>
            <td>Addition</td>
            <td>5 + 3 = 8</td>
        </tr>
        <tr>
            <td>-</td>
            <td>Subtraction</td>
            <td>5 - 3 = 2</td>
        </tr>
        <tr>
            <td>*</td>
            <td>Multiplication</td>
            <td>5 * 3 = 15</td>
        </tr>
        <tr>
            <td>/</td>
            <td>Division</td>
            <td>6 / 3 = 2</td>
        </tr>
    </tbody>
</table>

<table border="1">
    <caption>Logical Operators</caption>
    <thead>
        <tr>
            <th>Operator</th>
            <th>Description</th>
            <th>Example</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>&&</td>
            <td>AND</td>
            <td>true && false → false</td>
        </tr>
        <tr>
            <td>||</td>
            <td>OR</td>
            <td>true || false → true</td>
        </tr>
        <tr>
            <td>!</td>
            <td>NOT</td>
            <td>!true → false</td>
        </tr>
    </tbody>
</table>

<table border="1">
    <caption>Comparison Operators</caption>
    <thead>
        <tr>
            <th>Operator</th>
            <th>Description</th>
            <th>Example</th>
            <th>Result</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><code>==</code></td>
            <td>Equal (value only)</td>
            <td><code>$a == $b</code></td>
            <td>true if $a and $b have the same value</td>
        </tr>
        <tr>
            <td><code>!=</code></td>
            <td>Not equal</td>
            <td><code>$a != $b</code></td>
            <td>true if $a and $b have different values</td>
        </tr>
        <tr>
            <td><code>===</code></td>
            <td>Identical (value and type)</td>
            <td><code>$a === $b</code></td>
            <td>true if $a and $b are equal and of the same type</td>
        </tr>
        <tr>
            <td><code>!==</code></td>
            <td>Not identical</td>
            <td><code>$a !== $b</code></td>
            <td>true if $a and $b differ in value or type</td>
        </tr>
        <tr>
            <td><code>&gt;</code></td>
            <td>Greater than</td>
            <td><code>$a > $b</code></td>
            <td>true if $a is greater than $b</td>
        </tr>
        <tr>
            <td><code>&lt;</code></td>
            <td>Less than</td>
            <td><code>$a < $b</code></td>
            <td>true if $a is less than $b</td>
        </tr>
        <tr>
            <td><code>&gt;=</code></td>
            <td>Greater than or equal to</td>
            <td><code>$a >= $b</code></td>
            <td>true if $a is greater than or equal to $b</td>
        </tr>
        <tr>
            <td><code>&lt;=</code></td>
            <td>Less than or equal to</td>
            <td><code>$a <= $b</code></td>
            <td>true if $a is less than or equal to $b</td>
        </tr>
    </tbody>
</table>

    <?php
        echo "<br>";
        echo "Examples:";
        echo "<br>";
        echo "Arithmetic Operators";
        echo "<br>";
        echo "------------------<br>";
        

       
        $a = 10;
        $b = 3;

        echo $a + $b; //addition: 13
        echo "<br>";
        echo $a - $b; // subtraction: 7
        echo "<br>";
        echo $a * $b; // multiplication: 30
        echo "<br>";
        echo $a / $b; // div: 3.333...
        echo "<br>";
        echo $a % $b; // mod: 1
        echo "<br>";

        echo "Logical Operators";
        echo "<br>";
        echo "------------------<br>";
        $x = 5;
        $y = 8;

        var_dump($x == $y);  // false
        echo "<br>";
        var_dump($x != $y);  // true
        echo "<br>";
        var_dump($x < $y);   // true
        echo "<br>";
        var_dump($x > $y);   // false
        echo "<br>";
        var_dump($x <= $y);  // true
        echo "<br>";
        var_dump($x >= $y);  // false
        echo "<br>";

        echo "Comparison Operators";
        echo "<br>";
        echo "------------------<br>";

        $val1 = true;
        $val2 = false;

        var_dump($val1 && $val2); // false (and)
        echo "<br>";
        var_dump($val1 || $val2); // true (or)   
        echo "<br>";
        var_dump(!$val1);         // false (not)
        echo "<br>";    
?>

</body>
</html>

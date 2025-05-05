<!doctype html>
<html>
    <head>
        <title>XSS| Final Form</title>
        <meta charset="utf-8">
        <style>
            .error{
                color: #ff0000;
            }
        </style>
    </head>
    <body>
        <?php
        //define variables and set to empty values
        $nameErr=$emailErr=$commentErr=$genderErr=$websiteErr="";
        $name=$email=$comment=$gender=$website="";

        /*first checks if the method==POST 
        if its true chechks if the value is empty,
        if the value is empty drops warning message 
        else if it is not empty clears the value and checks 
        if it is in valid form */
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(empty($_POST["name"])){
                $nameErr="Name is required";
            }else{
                $name=sanitize_input($_POST["name"]);
                //checks if name only contains letters and whitespace
                if(!preg_match("/^[a-zA-Z]*$/",$name)){
                    $nameErr="Only letters and white space allowed";
                }
            }

            if(empty($_POST["email"])){
                $emailErr="Email is required";
            }else{
                $email=sanitize_input($_POST["email"]);
                if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                    $emailErr="Invalid email format!";
                }
            }

            if(empty($_POST["website"])){
                $website="";
            }else{
                $website=sanitize_input($_POST["website"]);
                if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)){
                    $websiteErr="Invalid URL";
                }         
            }
            
            if(empty($_POST["comment"])){
                $comment="";
            }else{
                $comment=sanitize_input($_POST["comment"]);
     
            }

            if(empty($_POST["gender"])){
                $gender="";
            }else{
                $gender=sanitize_input($_POST["gender"]);
            }
        }

        function sanitize_input($data){
            $data=trim((string)$data);
            $data=stripslashes($data);
            $data=htmlspecialchars($data);

            return $data;
        }
        ?>

        <h2>PHP Form Validation Example</h2>

        <p><span class="error">*required field.</span></p>

        <form method="post" action="">
            Name: <input type="text" name="name" value="<?php echo $name;?>"> <!--value="php..." we want if the page refreshes the data dont dissapear-->
            <span class="error">*<?php echo $nameErr;?></span> <br><br>
            Email: <input type="email" name="email" value="<?php echo $email;?>">
            <span class="error">*<?php echo $emailErr;?></span> <br><br>
            Website: <input type="text" name="website" value="<?php echo $website;?>">
            <span class=error>* <?php  echo $websiteErr; ?></span> <br><br>
            Comment: <textarea name="comment" rows=5 cols=40> <?php echo $comment; ?></textarea> <br><br>

            Gender: <input type="radio" name="gender"<?php if(isset($gender) && $gender=="female") echo "checked"; ?> value="Female">Female
            <input type="radio" name="gender"<?php if(isset($gender) && $gender=="male") echo "checked"; ?> value="male">Male
            <span class="error">* <?php echo $genderErr;?></span> <br><br>
            <input type="submit" name="submit" value="Submit">
        </form>

        <?php
            echo "<h2> Your input:<h2>";
            echo $name."<br>";
            echo $email."<br>";
            echo $website."<br>";
            echo $comment."<br>";
            echo $gender;
        ?>
        
    </body>

</html>
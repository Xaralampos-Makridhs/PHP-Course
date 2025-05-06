<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="">
        <title>Cookies|PHP</title>
    </head>
    <body>
        <?php
            /*cookies
            The server sends a cookie to the user's browser.
            The cookie is stored locally on the user's computer. 
            Each time the user visits the same website again, the browser automatically sends the cookie back to the server.
            This way, the server "remembers" the user.*/

            //setcookie(name,nvalue,expire,path,domain,secure,httponly)
            //domain,secure,httponly are optionally

            //cookie example

            $cookie_name="user";
            $cookie_value="Xarhs";

            setcookie($cookie_name,$cookie_value,time()+(86400*30),"/");
            //86400 secs =1day

            if(!isset($_COOKIE[$cookie_name])){
                echo "Cookie named: ".$cookie_name." is not set!"."<br>";
            }else{
                echo "Cookie: ". $cookie_name." is set!";
                echo "Cookie value ". $_COOKIE[$cookie_name];
            }
        ?>

        <!-- If you want to change the value of a cookie-->
         <p><strong>Note:</strong>You have to reload the page to see the value of cookie.</p>
        

         <?php
            $cookiename='visits';

            if(isset($_COOKIE[$cookiename])){
                $cookievalue=$_COOKIE[$cookiename]+1;//increase value by 1
            }else{
                $cookievalue=1;//first time visited the page
            }
         
            setcookie($cookiename,$cookievalue,time()+(86400*30),"/");
            //at the end because I want to change the value

            echo "You have visited this page " . $cookievalue . " times."."<br>";
         ?>
         
         <?php
            setcookie("testcookie","test",time()+3600,"/");//is the cookie enabled?

            if(count($_COOKIE)>0){
                echo "Cookies are enabled"."<br>";
            }else{
                echo "Cookies are disabled"."<br>";
            }
        ?>
        <p><strong>Note:</strong> You have to reload the page to check if cookies are enabled.</p><br><br>


        <!--Example-->
        <?php
        $namecookie='sayhi';
        
        if(isset($_COOKIE[$namecookie])){
            $valuecookie=$_COOKIE[$namecookie]+1;
            echo "You have visited the page".$valuecookie."times!"."<br>";
        }else{
            $valuecookie=1;
            echo "Welcome to the page"."<br>";
        }

        setcookie($namecookie,$valuecookie,time()+3600,"/");
        ?>

        <!--how to save choices in cookies-->
        <?php

        $default_color="white";
        ?>
    </body>
</html>
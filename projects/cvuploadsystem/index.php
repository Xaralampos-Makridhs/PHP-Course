<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Upload CV</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h2>Upload CV.</h2>
<?php
    include 'config.php';

    if($_SERVER["REQUEST_METHOD"]=='POST' && isset($_FILES['cv'])){
        $cv_name=basename($_FILES['cv']['name']);
        $cv_path="uploads/".uniqid()."-".$cv_name;

        if(move_uploaded_file($_FILES['cv']['tmp_name'],$cv_path)){
            $name=$conn->real_escape_string($_POST['name']);
            $email=$conn->real_escape_string($_POST['email']);

            $sql="INSERT INTO applications (name,email,cv_path) VALUES('$name','$email','$cv_name')";
            
            if($conn->query($sql)){
                echo "<p class='succes'>Successfully Uploaded!</p>";
            }else{
                echo "<p class='error'>Error :/</p>";
            }
        }else{
            echo "<p class='error'>Error:/</p>";
        }
    }
?>
    <div class="form">
    <form method="post" enctype="multipart/form-data">
        <div class="infos">
            <p>Name</p>
            <input type="text" name="name">
            <p>Email</p>
            <input type="text" name="email">
        </div>
        <div class="cv">
            <p>CV</p>
            <label class="filelabel">
                <input type="file" class="fileinput" name="cv" accept=".pdf,.doc,.docx" required>
            </label>
        </div>  
        <div class="btn">
            <button type="submit">Submit</button>
        </div>
    </form>
    </div>

    <div class="end">
        <a href="view.php">View Uploads</a>
    </div>
        
    </body>
</html>
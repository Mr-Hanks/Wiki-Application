<?php
include("authorization.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Add An Article- Secured Page</title>
        <link rel="stylesheet" href="css/style.css" />
    </head>

    <?php 
    if(isset($_POST['shortTitle'])){
        $shortTitle = $_POST['shortTitle'];
    }
    if(isset($_POST['title'])){
        $mainTitle = $_POST['title'];
    }
    if(isset($_POST['body'])){
        $bodyText = $_POST['body'];
    }
    if(isset($_POST['shortTitle']) && isset($_POST['title']) && isset($_POST['body'])){
        $db = new mysqli("localhost", "root", "", "wiki");
        $sql = "INSERT INTO articles (shortTitle, title, body) VALUES ('$shortTitle', '$mainTitle', '$bodyText')";
        $db->query($sql);         
        
        if($db){
            echo "<div class ='form'>
            <h3>You have successfully added an article</h3>
            </div>";
        }
    }
    ?>

    <body>
        <div class="form">
        <p>Add An Article</p>
        <p>This is another secured page.</p>
        <p><a href="wiki.php">Home</a></p>
        <a href="logout.php">Logout</a>

        <form action="addarticle.php" method=POST>
            <input type="text" name="shortTitle" placeholder="Enter A Short Title">
            <input type="text" name="title" placeholder="Enter The Title">
            <input type="text" name="body" placeholder="Enter The Article's Body">
            <input type="submit" value="Add Article!" class=textbttn>
        </form>
        </div>

    </body>
</html>

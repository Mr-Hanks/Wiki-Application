<?php
include("authorization.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edit Your Article-Secured Page</title>
        <link href="wiki.css" type="text/css" rel="stylesheet">
    </head>

    <?php 
    if(isset($_POST['id'])){
        $id = $_POST['id'];
    }
    if(isset($_POST['shortTitle'])){
        $shortTitle = $_POST['shortTitle'];
    }
    if(isset($_POST['title'])){
        $mainTitle = $_POST['title'];
    }
    if(isset($_POST['body'])){
        $bodyText = $_POST['body'];
    }
    if(isset($_POST['update'])){
        $db = new mysqli("localhost", "root", "", "wiki");
        $sql = "UPDATE articles SET shortTitle ='$shortTitle',title ='$mainTitle', body ='$bodyText' WHERE id= '$id' ";
        $result = $db->query($sql);         
        
        if($result){
            echo "<div class ='form'>
            <h3>You have successfully edited your article</h3>
            </div>";
        }
        else{
            echo "<div class ='form'>
            <h3>Your article was not edited</h3>
            </div>";
        }
    }
    ?>

    <body>
        <div class="form">
        <p>Edit An Article</p>
        <form action="edit.php" method=POST>
            <input class="text" type="text" name="id" placeholder="Enter The Article Number" required> <br>
            <input class="text" type="text" name="shortTitle" placeholder="Enter Your New Short Title" required> <br>
            <input class="text" type="text" name="title" placeholder="Enter The New Title" required> <br>
            <input class="textbox" type="text" name="body" placeholder="Enter The Article's New Body Text" required> <br>
            <input class ="submitbttn" type="submit" name="update" value="Update Article!">
        </form>

        <p>This is another secured page.</p>
        <p><a href="wiki.php">Home</a></p>
        <a href="logout.php">Logout</a>
        </div>

    </body>
</html>
<?php
include("authorization.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Add An Article- Secured Page</title>
        <link href="test.css" type="text/css" rel="stylesheet">
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
            echo "<div class ='other-form'>
            <h3>You have successfully added an article</h3>
            </div>";
        }
        else{
            echo "<div class ='other-form'>
            <h3>Your article was not added</h3>
            </div>";
        }
    }
    ?>

    <body>
        <div class="form">
            <p>Add An Article</p>

            <form action="addarticle.php" method=POST>
                <input class="text" type="text" name="shortTitle" placeholder="Enter A Short Title"> <br>
                <input class="text" type="text" name="title" placeholder="Enter The Title"> <br>
                <textarea class="textbox" name="body" placeholder="Enter The Article's Body"></textarea> <br>
                <div class="button-container-1">
                    <span class="mas">ADD</span>
                    <button id='work' type="submit" name="Hover">ADD</button>
                </div>
            </form>
            <div id="totheleft">
                <div class="button-container-1">
                    <span class="mas">Home</span>
                    <a href="wiki.php?short_title=371">
                        <button id='work' type="submit" name="Hover">Home</button>
                </div>
                
            </div>    
        </div>

    </body>
</html>
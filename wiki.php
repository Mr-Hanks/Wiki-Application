<?php
include("authorization.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome</title> 
        <meta charset="utf-8"/>
        <link href="wiki.css" type="text/css" rel="stylesheet">
    </head>


    <body>
        <div class="form">
            <p>Welcome <?php echo $_SESSION['username']; ?>!</p>
            <p>See Our Articles Below!</p>
            <?php 
    
            $db = new mysqli("localhost", "root", "", "wiki");
            $sql = "SELECT * FROM articles";
            $result = $db->query($sql);  
    
            if($result->num_rows > 0){
                while ($row = $result->fetch_assoc()){
                    echo"<strong>Article Number:</strong> <span>$row[id]</span> <br>
                    <strong>Short Title: </strong> <span>$row[shortTitle]</span> <br> 
                    <strong>Title: </strong> <span>$row[title]</span> <br> 
                    <strong>Article Body: </strong> <span>$row[body]</span> <br>";?>
                    <a href="edit.php">Edit The Article</a> <br>
                    <br>
                    <?php
                }
            }
                
            ?>
            <p><a href="addarticle.php">Add An Article</a></p>
            <a href="logout.php">Logout</a>
        </div>
    </body>
</html>
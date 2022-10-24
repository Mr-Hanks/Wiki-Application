<?php
include("authorization.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome</title> 
        <meta charset="utf-8"/>
        <link href="style.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <div class="form">
            <p>Welcome <?php echo $_SESSION['username']; ?>!</p>
            <p>This is secure area.</p>
            <p><a href="addarticle.php">Add An Article</a></p>
            <a href="logout.php">Logout</a>
        </div>
    </body>
</html>
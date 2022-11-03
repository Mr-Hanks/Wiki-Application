<?php
include("authorization.php");
?>
<?php 
$short_title =  $_GET['short_title'];

$con = new mysqli("localhost", "root", "", "wiki");

$query = "SELECT * FROM articles WHERE shortTitle = '$short_title'";
$result = $con->query($query);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Welcome</title> 
        <meta charset="utf-8"/>
        <link href="style.css" type="text/css" rel="stylesheet">
    </head>


    <body>
        <div class="other-form">
            <p>Welcome <?php echo $_SESSION['username']; ?>!</p>
            <p>See Our Articles Below!</p>
            
            <form action="wiki.php" method="POST">
                <?php
                if($result->num_rows > 0){
                    while ($row = $result->fetch_assoc()){
                        echo "<strong>Short Title: </strong> <span>$row[shortTitle]</span> <br> 
                        <strong>Title: </strong> <span>$row[title]</span> <br> 
                        <strong>Article Body: </strong> <span>$row[body]</span> <br>
                        <a href='edit.php?id=" .$row['id'] ."'>Edit The Article</a> <br>";?>
                        <br>
                        
                        <input type="hidden" name="short_title" value="<?php echo $short_title;?>">
                        <?php
                    }
                }   
                ?>
            </form>
            <p><a href="addarticle.php">Add An Article</a></p>
            <a href="logout.php">Logout</a>
        </div>
    </body>
</html>
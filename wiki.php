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
        <link href="test.css" type="text/css" rel="stylesheet">
    </head>


    <body>
        <div class="other-form">
            <div class="other-other-form">
                <p>Welcome<span id="name"> <?php echo $_SESSION['username']; ?></span>!</p>
                <p>Check Out Our Articles!</p>
            </div>
            
            <form action="wiki.php" method="POST">
                <?php
                if($result->num_rows > 0){
                    while ($row = $result->fetch_assoc()){
                        echo "<div id='art'>
                                <strong>Short Title: </strong> <span>$row[shortTitle]</span> <br> 
                                <strong>Title: </strong> <span>$row[title]</span> <br> 
                                <strong>Article Body: </strong> <span>$row[body]</span> <br>
                              </div>
                              <a style='color:blue;' href='edit.php?id=" .$row['id'] ."'>Edit The Article</a> <br>";?>
                        <br>
                        
                        <input type="hidden" name="short_title" value="<?php echo $short_title;?>">
                        <?php
                    }
                }   
                ?>
            </form>
        </div>
            <div id="totheleft">
                <div class="button-container-1">
                    <span class="mas">Add An Article</span>
                    <a href="addarticle.php">
                        <button id='work' type="submit" name="Hover">Add An Article</button>
                </div>
                <div class="button-container-1">
                    <span class="mas">Logout</span>
                    <a href="logout.php">
                        <button id='work' type="submit" name="Hover">Logout</button>
                </div>
            </div>
    </body>
</html>


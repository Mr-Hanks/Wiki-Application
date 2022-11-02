<?php include("authorization.php"); ?>
<?php
    if(!isset($_GET['id'])){
        // redirect to show page
        die('id not provided');
    }
    
    $id =  $_GET['id'];
    $con = new mysqli("localhost", "root", "", "wiki");
    $sql = "SELECT * FROM articles where id = '$id'";
    $result = $con->query($sql);
    if($result->num_rows != 1){
        // redirect to show page
        die('id is not in db');
    }
    $data = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Edit</title>
    <link href="wiki.css" type="text/css" rel="stylesheet">
</head>
<body>        
    <div class="form">
        <form action="modify.php?id=<?= $id ?>" method="POST">
            <h3>Edit Form</h3>
            <div>
                <label for="shortTitle">Short Title:</label>
                <?php echo "<span><strong>$data[shortTitle]</span></strong>"; ?>
            </div>
            <div>
                <label for="title">Title</label><br>
                <input type="text" class="text" name="title" value="<?= $data['title']?>"><br>
            </div>
            <div>
                <label for="description">Description</label><br>
                <textarea class="textbox" name="body"><?= $data['body']?></textarea><br>
            </div>

            <input type="submit" name="editForm" value="Edit The Article!" class="submitbttn">
        </form>
     </div>
        
    
</body>
</html>
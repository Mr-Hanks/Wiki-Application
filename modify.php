<?php ob_start(); ?>
<?php include("authorization.php"); 
include("edit.php")?>
<?php
    if(isset($_GET['id']) && isset($_POST['editForm'])){
        $id = $_GET['id'];
        
        $title = $_POST['title'];
        $bodyText = $_POST['body'];

        $con = new mysqli("localhost", "root", "", "wiki");
        $sql = "UPDATE `articles` SET 
                `title`= '$title',
                `body`= '$bodyText' 
                WHERE id = $id";

        if($con->query($sql) === TRUE){
            header('Location: wiki.php?short_title=' . $data['shortTitle']);
        }else{
            echo "something went wrong";
        }
        
    }else{
        echo "invalid";
    }
?>
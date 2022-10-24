<?php
session_start();
if(!isset($SESSION['username'])){
    header("Location: login.php");
    exit();
}
?>
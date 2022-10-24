



<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Registration</title> 
        <meta charset="utf-8"/>
        <link href="style.css" type="text/css" rel="stylesheet">
    </head>

    <body>
        <?php
        #require('database.php');
        if(isset($_POST['username'])){
            $username = $_POST['username'];
        }
        if(isset($_POST['password'])){
            $username = $_POST['password'];
        }

        if (isset($_POST['username']) && isset($_POST['password'])){
            $db = new mysqli("localhost", "root", "", "P*ssword", "wiki");
            $sql = "INSERT INTO wiki (username, password) VALUES ('$username', '".md5($password)."')";
            $result->query($sql);

            if($result){
                echo "<div class ='form'>
                <h3>You have successfully registered</h3>
                <br/>Click here to <a href='login.php'>Login</a>
                </div>";
            }
        }else{
            ?>
            <div class="form">
                <h1>Registration</h1>
                <form name="registration" action="" method="post">
                    <input type="text" name="username" placeholder="Username" required />
                    <input type="password" name="password" placeholder="Password" required />
                    <input type="submit" name="submit" value="Register" />
                </form>
            </div>
            <?php } ?>
        
    </body>
</html>
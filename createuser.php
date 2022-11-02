



<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Registration</title> 
        <meta charset="utf-8"/>
        <link href="wiki.css" type="text/css" rel="stylesheet">
    </head>

    <body>
        <?php
        if(isset($_POST['username'])){
            $username = $_POST['username'];
        }
        if(isset($_POST['password'])){
            $password = $_POST['password'];
        }

        if (isset($_POST['username']) && isset($_POST['password'])){
            $db = new mysqli("localhost", "root", "", "wiki");
            $sql = "SELECT * FROM users WHERE username = '$username'";
            $res = $db->query($sql);

            if($res->num_rows > 0){
                echo "<div class ='form'>
                <h3>Username is already in use</h3>
                <br/><a href='createuser.php'>Register With A New Username</a>
                </div>";
            }
            else{
                $query = "INSERT INTO users (username, password) VALUES ('$username', '".md5($password)."')";
                $db->query($query);
                if($db){
                    echo "<div class ='form'>
                    <h3>You have successfully registered</h3>
                    <br/>Click Here To <a href='login.php'>Login</a>
                    </div>";
                }
            }
        }else{
            ?>
            <div class="form">
                <h1>Registration</h1>
                <form name="registration" action="" method="POST">
                    <input class="text" type="text" name="username" placeholder="Username" required />
                    <input class="text" type="password" name="password" placeholder="Password" required />
                    <input class="submitbttn" type="submit" name="submit" value="Register"/>
                </form>
            </div>
            <?php } ?>
        
    </body>
</html>
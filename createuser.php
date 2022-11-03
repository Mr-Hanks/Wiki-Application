<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Registration</title> 
        <meta charset="utf-8"/>
        <link href="style.css" type="text/css" rel="stylesheet">
    </head>

    <body>
    <img class="logo" src="assets/purple-play-company-logo-741ADB4144-seeklogo.com.png">
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
                echo "<div class ='login-form'>
                <h3>Username is already in use</h3>
                <br/><a href='createuser.php'>Register With A New Username</a>
                </div>";
            }
            else{
                $query = "INSERT INTO users (username, password) VALUES ('$username', '".md5($password)."')";
                $db->query($query);
                if($db){
                    echo "<div class ='login-form'>
                    <h3>You have successfully registered</h3>
                    <br/>Click Here To <a href='login.php'>Login</a>
                    </div>";
                }
            }
        }else{
            ?>
            <div class="login-form">
                <h1>Registration</h1>
                <form name="registration" action="" method="POST">
                    <div class="opacity">
                        <input class="text" type="text" name="username" placeholder="Username" required />
                        <input class="text" type="password" name="password" placeholder="Password" required />
                    </div>
                    <div class="button-container-1">
                        <span class="mas">REGISTER</span>
                        <button id='work' type="submit" name="Hover">REGISTER</button>
                    </div>
                </form>
            </div>
            <?php } ?>
        
    </body>
</html>
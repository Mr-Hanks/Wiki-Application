<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8"/>
        <link href="test.css" type="text/css" rel="stylesheet">
    </head>
    <body>
    <img class="logo" src="assets/purple-play-company-logo-741ADB4144-seeklogo.com.png">
            <?php
            session_start();
            if(isset($_POST['username'])){
                $username = $_POST['username'];
            }
            if(isset($_POST['password'])){
                $password = $_POST['password'];
            }

            if (isset($_POST['username']) && isset($_POST['password'])){
                $db = new mysqli("localhost", "root", "", "wiki");
                $input = "SELECT * FROM users WHERE username='$username' and password='".md5($password)."'";
                $result= $db->query($input);
                $rows = mysqli_num_rows($result);

                if($rows==1){
                    $_SESSION['username']=$username;

                    header("Location: wiki.php?short_title=371");
                }else{
                echo "<div class= 'login-form'>
                <h3>Username/Password is incorrect</h3>
                <br/>Click here to <a href='login.php'>Login</a>
                </div>";
                }
            }else{
                ?>
                <div class="login-form">
                    <h1>LOG IN</h1>
                    <form name="login" action="" method="POST">
                        <div class="opacity">
                            <input class="text" type="text" name="username" placeholder="Username" required />
                            <input class="text" type="password" name="password" placeholder="Password" required />
                        </div>
                        <div class="button-container-1">
                            <span class="mas">LOGIN</span>
                            <button id='work' type="submit" name="Hover">LOGIN</button>
                        </div>
                    </form>

                    <p>Not Registered? <a id="test" href='createuser.php'>Register Here</a></p>
                </div>
                <?php } ?>
    </body>
</html>       
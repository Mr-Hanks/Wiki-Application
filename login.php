<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title> 
        <meta charset="utf-8"/>
        <link href="wiki.css" type="text/css" rel="stylesheet">
    </head>

    <body>
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

                header("Location: wiki.php");
            }else{
            echo "<div class= 'form'>
            <h3>Username/Password is incorrect</h3>
            <br/>Click here to <a href='login.php'>Login</a>
            </div>";
            }
        }else{
            ?>
            <div class="form">
                <h1>Login</h1>
                <form name="login" action="" method="POST">
                    <input class="text" type="text" name="username" placeholder="Username" required />
                    <input class="text" type="password" name="password" placeholder="Password" required />
                    <input class="submitbttn" type="submit" name="submit" value="Login" />
                </form>
                <p>Not Registered? <a href='createuser.php'>Register Here</a></p>
            </div>
            <?php } ?>
        
    </body>

</html>    
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Registration</title> 
        <meta charset="utf-8"/>
        <link href="style.css" type="text/css" rel="stylesheet">
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
            $sql = "SELECT * FROM users WHERE username='$username' and password='".md5($password)."'";
            $db->query($sql);
            $rows = mysqli_num_rows($db);

            if($rows==1){
                $_SESSION['username']=$username;

                header(Location: "wiki.php");
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
                    <input type="text" name="username" placeholder="Username" required />
                    <input type="password" name="password" placeholder="Password" required />
                    <input type="submit" name="submit" value="Register" />
                </form>
                <p>Not Registered? <a href='createuser.php'>Register Here</a></p>
            </div>
            <?php } ?>
        
    </body>

</html>    
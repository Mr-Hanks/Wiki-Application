<!-- Collin Hanks C00411997
     INFX371 Project 1-->


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Group Text</title> 
        <meta charset="utf-8"/>
        <link href="style.css" type="text/css" rel="stylesheet">
    </head>

    <?php
    if(isset( $_POST['user'])){
        $userName = $_POST['user'];
    }
    if (isset($_POST['message'])) {
        $text = $_POST['message'];
    }
    date_default_timezone_set("America/Chicago");
    $time = date("h:i:s");

    $regexCheck = "/[a-zA-Z]/";
    if (isset($_POST['user']) && isset($_POST['message'])){
        if ((preg_match($regexCheck, $userName) == 1) && (preg_match($regexCheck, $text) == 1)) {
            $db = new mysqli("localhost", "INFX371", "P*ssword", "texts");
            $sql = "INSERT INTO texts (user, message, time) VALUES ('$userName', '$text', '$time')";
            $db->query($sql);
            
            $void = false;
        }
        else {
            $void = true;
        }
    }
    ?>

    <body> 
        <div id="container">
            <header>
                <h1>Group Text!</h1> 
            </header>
            <div id="textdisplay">
                <div class="text">
                    <?php
                    $db = new mysqli("localhost", "INFX371", "P*ssword", "texts");
                    $input = "SELECT * FROM texts";
                    $result = $db->query($input);
        
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<span>$row[time]</span> <strong>$row[user]</strong> $row[message] <br>";
                        }
                    }
                    ?>
                </div>
            </div>
            <div id="input">
                <?php
                if(isset($_POST['user'])){ 
                    if ($void){?> 
                        <div class="error"><p>Please fill in your name and message</p></div>
                        <?php
                    }
                }
                ?>
                
                <form action="index.php" method="POST"> 
                    <input type="text" name="user" placeholder="Enter Your Name"> 
                    <input type="text" name="message" placeholder="Enter A Message"> 
                    <input type="submit" value="Text eveyone" class="textbttn" > 
                </form>

            </div>

        </div>

    </body>

</html> 

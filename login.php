<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>ISAEK OMHROS CHATROOM LOGIN</title>
</head>
<body>
    <div class="cont-1">
    <a href="http://127.0.0.1/ChatRoom/login.php"><img src="assets/omhros.png" alt="OMHROS IMAGE"></a>
    <h2 class="header">ΙΣΑΕΚ CHATROOM</h2>
        <div class="cont-2">
            <div class="cont-3">
                <div class="cont-4">
                    <form method="post" action="login.php">
                        <table>
                            <tr>
                                <td><label for="usr">Username:</label></td>
                                <td><input type="text" name="usr" id="usr" placeholder="Username" required></td>
                            </tr>
                            <tr>
                                <td><label for="pass">Password:</label></td>
                                <td><input type="password" name="pass" id="usr" placeholder="Password" required></td>
                            </tr>
                            <tr>
                                <td><a href="register.php"><input type="button" name="register" id="register" value="Register"></a></td>
                                <td><input type="submit" name="login" id="login" value="Login"></td>
                            </tr>
                            <?php
                                include("config.php");

                                if(isset($_POST['login']))
                                {
                                    $usr = $_POST['usr'];
                                    $pass = $_POST['pass'];

                                    require_once "config.php";

                                    $sql = "select * from usrs where usr = '$usr'";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                                    $errors = array();

                                    if($row)
                                    {
                                        if(password_verify($pass, $row['pass']))
                                        session_start();
                                        $_SESSION['usr'] = "yes";
                                        header("Location: chatroom.php");
                                        die();
                                    }
                                    else
                                    {
                                        array_push($errors, "Wrong Username Or Password.<br> Please Try Again!");
                                    }

                                    if(count($errors) > 0)
                                    {
                                        foreach ($errors as $error)
                                        {
                                            echo "<div class='alert'>$error</div>";
                                        }
                                    }
                                }
                            ?>
                        </table>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</body>
</html>
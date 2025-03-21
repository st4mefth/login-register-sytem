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
    <h2 class="header">ΙΣΑΕΚ CHATROOM REGISTER</h2>
        <div class="cont-2">
            <div class="cont-3">
                <div class="cont-4">
                    <form method="post" action="register.php">
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
                                <td><label for="pass">Confirm:</label></td>
                                <td><input type="password" name="confirm" id="usr" placeholder="Password" required></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" name="register" class="register" value="Register"></td>
                            </tr>
                            <?php
                                include("config.php");

                                if(isset($_POST['register']))
                                {
                                    $usr = $_POST['usr'];
                                    $pass = $_POST['pass'];
                                    $confirm = $_POST['confirm'];

                                    $pass_hash = password_hash($pass, PASSWORD_DEFAULT);

                                    $errors = array();

                                    if(empty($usr) OR empty($pass) OR empty($confirm))
                                    {
                                        array_push($errors, "Please Make Sure That All Fields Are Mandantory!");
                                    }

                                    $sql = "select * from usrs where usr = '$usr'";

                                    if($result = mysqli_query($conn, $sql))
                                    {
                                        if(mysqli_num_rows($result)>0)
                                        {
                                            array_push($errors, "Username Already Taken. Looser ;)");
                                        }
                                    }

                                    if(strlen($pass)<6)
                                    {
                                        array_push($errors, "Password Must Be At Least 6 Characters Long.");
                                    }

                                    if($pass !== $confirm)
                                    {
                                        array_push($errors, "Password Does Not Match!");
                                    }
                    
                                    if(count($errors) > 0)
                                    {
                                        foreach ($errors as $error)
                                        {
                                            echo "<div class='alert'>$error</div>";
                                        }
                                    }
                                    else
                                    {
                                        require_once "config.php";
                                        $insert = "INSERT INTO usrs (usr, pass) VALUES (?, ?)";
                                        $stmt = mysqli_stmt_init($conn);
                                        $prepare = mysqli_stmt_prepare($stmt, $insert);

                                        if($prepare)
                                        {
                                            mysqli_stmt_bind_param($stmt, "ss", $usr, $pass_hash);
                                            mysqli_stmt_execute($stmt);
                                            echo "<div class='success'>You Are Successfully Registered! Click <a href='login.php'>Here</a> To Login!</div>";
                                        }
                                        else
                                        {
                                            echo "<div class='alert'>Something Went Wrong :(</div>";
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
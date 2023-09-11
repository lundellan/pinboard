<?php
include("header.php");
?>

<html>
    <head>
        <link href = "styles/signupstyle.css" rel = "stylesheet" type = "text/css">
    </head>
    <body>
        <?php 
            if (isset($_SESSION['id'])){
                echo "You are already logged in!";
            }else{
                if (isset($_GET['error'])){
                    if ($_GET['error'] == "username"){
                        echo "<p>Username doesn't exist, check your spelling.</p>";
                    } elseif ($_GET['error'] == "password"){
                        echo "<p>Password incorrect.</p>";
                    }
                }
                echo "<form id = 'signup' action = 'process/login.pro.php' method='POST'>
                <input type = 'text' name = 'UsernameEmail' placeholder='Username or Email'><br>
                <input type = 'password' name = 'Pwd' placeholder='Password'><br>
                <input type ='hidden' name = 'date' value = ".date('Y-m-d H:i:s').">
                <input type = 'submit' value = 'Login'>
                </form>"; 
            } 
                
            
            ?>
        
    </body>
</html>
<?php
include("header.php");
?>



<html>
    <head>
        <link href = "styles/signupstyle.css" rel = "stylesheet" type = "text/css">
        
    </head>
    <body>
        <?php
        if (isset($_GET["error"])){
            if ($_GET["error"] == "taken"){
                echo "Username taken, take another one :D!";
            }elseif ($_GET['error'] == "empty"){
                echo "Please fill in all the information.";
            }
        }
       $date = date('Y-m-d H:i:s');
        ?>
        <?php echo "<form id = 'signup' action = 'process/signup.pro.php' method='POST'>
            <input type = 'text' name = 'Firstname' placeholder='Firstname'><br>
            <input type = 'text' name = 'Lastname' placeholder='Lastname'><br>
            <input type = 'text' name = 'Address' placeholder='Address'><br>
            <input type = 'text' name = 'Email' placeholder='Email'><br>
            <input type = 'text' name = 'Username' placeholder='Username'><br>
            <input type = 'password' name = 'Pwd' placeholder='Password'><br>
            <input type ='hidden' name = 'date' value = '$date'>
            
            
            <input type = 'submit' value = 'Signup'>
            </form>";
            
            ?>
        
    </body>
</html>
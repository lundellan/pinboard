<?php
include "header.php";
include "process/dbConn.php";
?>

<html>
    <head>
        <link href = "styles/writepost.css" rel = 'stylesheet' type = "text/css">
    </head>
    <body>
        <?php
        if (isset($_GET['error'])){
            if ($_GET['error']=='acc'){
                echo "Unknown user, are you hacking?";
            } else {
                echo "Unknown error, please contact admin";
            }
        }
        if (isset($_SESSION['id'])){
            /*is logged in*/
            $date = date('Y-m-d H:i:s');
            echo "
                <form action = 'process/writepost.pro.php' method = 'post' id = 'postSection'>
                <textarea name = 'Message'></textarea> <br>
                <div id = 'postSectionP'>
                <input type = 'text' placeholder='Subject' name='Subject' class = 'input'>
                <input type = 'text' placeholder='Category' name = 'Category' class = 'input'>
                </div>
                <input type = 'submit' name = 'submit' value = 'post'>
                <input type = 'hidden' name = 'Date' value = '$date'>
                </form>";
            
        } else {
            /*is logged out*/
            echo "<br><p>You are not logged in, and can therefore not write a post!</p> <br>
            <p>Login here: <a href = 'login.page.php'>login</a></p><br>
            <p>Signup here: <a href = 'signup.page.php'>signup</a></p>";
        }
        
        ?>
    </body>
</html>
<?php
include "header.php";
include "process/dbConn.php";
?>

<html>
    <body>
        <?php
        if (isset($_SESSION['id'])){
            $id = $_SESSION['id'];
            $sql = "SELECT * FROM $tableUser WHERE id = '$id'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if ($row){
                $Username = $row['Username'];
                $Firstname = $row['Firstname'];
                $Lastname = $row['Lastname'];
                $Address = $row['Adress'];
                $Email = $row['Email'];
                $Date = $row['JoinDate'];
                $ProfileViews = $row['ProfileViews'];
                $Posts = $row['Posts'];
                $JoinNumber = $row['id'];
                $UpVotes = $row['UpVotes'];
                echo "<h1>".$Username."</h1>
                <p>Name: ".$Firstname." ".$Lastname."<br>
                Address: ".$Address."<br>
                Email: ".$Email."<br>
                Account started: ".$Date."<br>
                Profile views: ".$ProfileViews."<br>
                Posts: ".$Posts."<br>
                Join number: ".$JoinNumber."<br>
                Up votes: ".$UpVotes."</p>";    
                
            }else{
                echo "unexpected error, an email has been sent to the developers who will fix this immediatley!";
            }
            
        }else{
            echo "<br><p>You are not logged in!</p> <br>
            <p>Login here: <a href = 'login.page.php'>login</a></p><br>
            <p>Signup here: <a href = 'signup.page.php'>signup</a></p>";
        }
        
        ?>
    </body>
</html>
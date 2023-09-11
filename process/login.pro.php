<?php
include "header.pro.php";
include "dbConn.php";

$Username = $_POST['UsernameEmail'];//mysqli_real_escape_string($conn, $_POST['UsernameEmail']); /* This can be ones email or username*/
$Date = mysqli_real_escape_string($conn, $_POST['date']);
$PwdRaw = mysqli_real_escape_string($conn, $_POST['Pwd']);


$stmt = $conn->prepare("SELECT Pwd, id FROM $tableUser WHERE Username=? or Email=?");
$stmt->bind_param('ss', $username, $username);

$username = $Username;

$stmt->execute();

$result=$stmt->get_result();

$row = $result->fetch_assoc();


if($row){
    
    if(!password_verify($PwdRaw, $row['Pwd'])){
        /*password incorrect*/
        $date = date('Y-m-d H:i:s');
        $ip = $_SERVER['REMOTE_ADDR'];
        $id = $row['id'];
        $sqlR = "INSERT INTO $tableLogin(DateLogin, Userid, comment, ipConnect, Username) VALUES('$date', '$id', 'pwrong', '$ip', '$Username');";
        $conn->query($sqlR);
        
        header("Location: ../login.page.php?error=password");
        exit();
    }else{
        /*password correct*/
        $date = date('Y-m-d H:i:s');
        $ip = $_SERVER['REMOTE_ADDR'];
        $id = $row['id'];
        $sqlR = "INSERT INTO $tableLogin(DateLogin, Userid, comment, ipConnect, Username) VALUES('$date', '$id', 'loggedin', '$ip', '$Username')";
        $conn->query($sqlR);
        
        echo "correct";
        $_SESSION['id'] = $row['id'];
        header("Location: ../login.page.php");
        exit();
    }
} else {
    $date = date('Y-m-d H:i:s');
    $ip = $_SERVER['REMOTE_ADDR'];
    $sqlR = "INSERT INTO $tableLogin(DateLogin, Userid, comment, ipConnect, Username) VALUES('$date', -1, 'nexist', '$ip', '$Username')";
    $conn->query($sqlR);
    header("Location: ../login.page.php?error=username");
    exit();
}
?>
<?php
include "header.pro.php";
include "dbConn.php";

$Username = mysqli_real_escape_string($conn, $_POST['Username']);
$Firstname = mysqli_real_escape_string($conn, $_POST['Firstname']);
$Lastname = mysqli_real_escape_string($conn, $_POST['Lastname']);
$Address = mysqli_real_escape_string($conn, $_POST['Address']);
$Email = mysqli_real_escape_string($conn, $_POST['Email']);
$Date = mysqli_real_escape_string($conn, $_POST['date']);
echo $Date;
$PwdRaw = $_POST['Pwd'];
if (empty($Username) or empty($Firstname) or empty($Lastname) or empty($Address) or empty($Email) or empty($PwdRaw)){
    /*Empty*/
    header("Location: ../signup.page.php?error=empty");
    exit();
}else{
    $stmt = $conn->prepare("SELECT Username FROM $tableUser WHERE Username=? or Email=?");
    $stmt->bind_param('ss', $User, $Ema);
    
    $Ema = $Email;
    $User = $Username;
    $stmt->execute();

    $result=$stmt->get_result();

    $row = $result->fetch_assoc();
    if ($row){
        /*someone has the username*/
        header("Location: ../signup.page.php?error=taken");
        exit();
    }else{
        $Pwd = password_hash($PwdRaw, PASSWORD_DEFAULT);
        
        $stmt = $conn->prepare("INSERT INTO $tableUser(Firstname, Lastname, Rank, Email, JoinDate, Posts, Adress, UserName, Pwd, Confirmed, ProfileViews) VALUES(
        ?, ?, 'Member', ?, ?, 0, ?, ?, ?, false, 0)");
        
        $stmt->bind_param('sssssss', $F, $L, $E, $D, $A, $U, $P);
        $F = $Firstname;
        $L = $Lastname;
        $E = $Email;
        $D = $Date;
        $A = $Address;
        $U = $Username;
        $P = $Pwd;
        $stmt->execute();

        
        //$sql = "INSERT INTO $tableUser(Firstname, Lastname, Rank, Email, JoinDate, Posts, Adress, UserName, Pwd, Confirmed, ProfileViews) VALUES('$Firstname', '$Lastname', 'Member', '$Email', '$Date', 0, '$Address', 
        //'$Username', '$Pwd', false, 0)";
        //$conn->query($sql);
        header("Location: ../signupSucces.page.php");
        exit();
    }
    
}


?>
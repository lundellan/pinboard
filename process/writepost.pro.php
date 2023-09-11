<?php
session_start();
include 'dbConn.php';
$Content = $_POST['Message'];
$Date = $_POST['Date'];
$Subject = $_POST['Subject'];
$Category = $_POST['Category'];
$Uid = $_SESSION['id'];

$sql = "SELECT Username FROM $tableUser WHERE id = '$Uid'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($row){
    $Username = $row['Username'];
    $stmt = $conn->prepare("INSERT INTO $tablePosts (uid, Content, Category, Subject, DatePublished, Username) VALUES(?, ?, ?, ?, ?, ?);");
    $stmt->bind_param('ssssss', $UidP, $ContentP, $CategoryP, $SubjectP, $DateP, $UsernameP);
    $UidP = $Uid;
    $ContentP = $Content;
    $CategoryP = $Category;
    $SubjectP = $Subject;
    $DateP = $Date;
    $UsernameP = $Username;
    
    $stmt->execute();
    header("Location: ../writepost.page.php");
    exit();
} else {
    header("Location: ../writepost.page.php?error=acc");
    exit();
}
?>
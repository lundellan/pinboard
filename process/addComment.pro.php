<?php
include "dbConn.php";
session_start();

$DatePublished = $_POST['Date'];
$pid = $_POST['pid'];
$Content = $_POST['Content'];

/* get username */
if (isset($_SESSION['id'])) {
    $stat = $conn->prepare("SELECT * FROM $tableUser WHERE id = ?;");
    $stat->bind_param("s", $UID);
    $UID = $_SESSION['id'];
    $stat->execute();
    $result = $stat->get_result();
    $row = $result->fetch_assoc();
    $Username = $row['Username'];
    
} else {
    $Username = 'Anonymous';
}



$stat = $conn->prepare("INSERT INTO $tableComments (`Author`, `UpVotes`, `DownVotes`, `Content`, `DatePublished`, `Pid`) VALUES(?, ?, ?, ?, ?, ?);");
$stat->bind_param("ssssss", $UsernameP, $UV, $DV, $ContentP, $DatePublishedP, $PidP);
$UsernameP = $Username;
$UV = 0;
$DV = 0;
$ContentP = $Content;
$DatePublishedP = $DatePublished;
$PidP = $pid;
$stat->execute();

header("Location: ../viewpost.page.php?pid=$pid");
?>
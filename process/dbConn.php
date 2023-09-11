<?php
    

    $hostSQL = "localhost";
    $usernameSQL = "root";
    $passwordSQL = "";
    $dbSQL = "social";

    $tableUser = "people";
    $tablePosts = 'posts';
    $tableLogin = 'logindata';
    $tableComments = 'comments';
    $conn = new mysqli($hostSQL, $usernameSQL, $passwordSQL, $dbSQL);

    if (!$conn){
        echo $conn->connect_error;
    }
/*CREATE TABLE people (
	id int(12) AUTO_INCREMENT PRIMARY KEY,
	Firstname VARCHAR(100) not null,
    Lastname VARCHAR(100) not null,
    Rank VARCHAR(100) not null,
    Email VARCHAR(500) not null,
    JoinDate DATETIME not null,
    Posts int(10) not null,
    Adress VARCHAR(100) not null,
    Username VARCHAR(100) not null,
    Pwd VARCHAR(300) not null,
    Confirmed BOOLEAN not null,
    ProfileViews int(10) not null,
    UpVotes int(10) not null
);
CREATE TABLE logindata (
	liid int(11) AUTO_INCREMENT PRIMARY KEY,
    DateLogin DateTime not null,
    Userid int(11) not null,
    comment varchar(200) not null,
    ipConnect varchar(200) not null,
    Username varchar(200) not null
);
CREATE TABLE posts (
	pid int(11) AUTO_INCREMENT PRIMARY KEY,
    uid int(11) not null,
    Content text not null,
    Category varchar(100) not null,
    Subject varchar(100) not null,
    DatePublished datetime not null
);

CREATE TABLE comments (
	cid int(11) AUTO_INCREMENT PRIMARY KEY,
    Author varchar(100) NOT NULL,
    UpVotes int(10) NOT NULL,
    DownVotes int(10) NOT NULL,
    Content text NOT NULL,
    DatePublished DateTime NOT NULL,
    pid int(11) NOT NULL
);
*/
?>


<?php 
include 'header.php';
include 'process/dbConn.php'
?>

<html>
    <head>
        <link href = "styles/post.css" rel='stylesheet' type = "text/css">
    </head>
    <body>
        <ul>
            <li></li>
        </ul>
        
        <?php
            echo "<h1><a href = 'explore.page.php?type=newest'>Newest &#160; &#160;</a><a href = 'explore.page.php?type=popular'>Popular &#160; &#160;</a><a href = 'explore.page.php?type=trending'>Trending &#160; &#160;</a></h1><br><br>";
            if (isset($_GET['type'])){
                if ($_GET['type'] == 'newest'){
                        
                } elseif ($_GET['type'] == 'popular') {
                    $sql = "SELECT * FROM $tablePosts ORDER BY UpVotes DESC";
                    $result = $conn->query($sql);

                    while($row = $result->fetch_assoc()){
                        $link = "viewpost.page.php?pid=".$row['pid'];
                        echo "<a href = $link class = 'linkBox'><div class = 'commentBox'><p>Author: $row[Username]</p>
                        <p>Category: $row[Category]</p>
                        <p>Date: $row[DatePublished]</p>
                        <p>$row[Content]</p></div></a><br>";
                    }
                }
            } else {
                //basically newest
               
                
                
                $sql = "SELECT * FROM $tablePosts ORDER BY DatePublished DESC";
                $result = $conn->query($sql);
                
                while($row = $result->fetch_assoc()){
                    $link = "viewpost.page.php?pid=".$row['pid'];
                    echo "<a href = $link class = 'linkBox'><div class = 'commentBox'><p>Author: $row[Username]</p>
                    <p>Category: $row[Category]</p>
                    <p>Date: $row[DatePublished]</p>
                    <p>$row[Content]</p></div></a><br>";
                }
            }
            
        ?>
    </body>
</html>
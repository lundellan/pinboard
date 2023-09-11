<?php
include 'header.php';
include 'process/dbConn.php';
?>

<html>
    <head>
        <link href = "styles/postView.css" type = "text/css" rel = 'stylesheet'>
    </head>
    <body>
        
        <?php
        if (isset($_GET['pid'])){
            $pid = $_GET['pid'];
            
            $stat=$conn->prepare("SELECT * FROM $tablePosts WHERE pid = ?");
            $stat->bind_param("s", $postId);
            $postId = $pid;
            
            $stat->execute();
            $result = $stat->get_result();
            $row= $result->fetch_assoc();
            if ($row){
                $date = date('Y-m-d H:i:s');
                echo "<div class = 'MainPost'>
                <h3>$row[Subject]</h3>
                <h4>Author: $row[Username]</h4>
                <h4>Category: $row[Category]</h4>
                <h4>Date Published: $row[DatePublished]</h4>
                <p>$row[Content]</p>
                </div>";
                
                echo "<div id = 'likeButton'><form id = 'likeButton' method = 'post' action = 'process/likepost.pro.php'>
                <input type = 'hidden' value = $pid name = 'pid'>
                <input type = 'hidden' value = '$date' name = 'Date'>
                <input type = 'submit' value = 'Like'>
                </form></div>";
                
                /*Check for comments*/
                $stat = $conn->prepare("SELECT * FROM $tableComments WHERE pid = ?");
                $stat->bind_param("s", $pid);
                $stat->execute();
                $result = $stat->get_result();
                
                while ($row = $result->fetch_assoc()) {
                    echo "<div class = 'comment'>
                    <p>Author: $row[Author]</p>
                    <p>Published: $row[DatePublished]</p>
                    <p>$row[Content]</p>
                    </div>";
                };
                
                
                echo "<div id = commentText><form method = 'post' action = 'process/addComment.pro.php'>
                <textarea name = 'Content' placeholder='Comment now!'></textarea><br>
                <input type = 'hidden' value = $pid name = 'pid'>
                <input type = 'hidden' value = '$date' name = 'Date'>
                <input type = 'submit' value = 'Comment'>
                </form></div>";

            } else {
                echo "<h2>This post seems to have been eaten by the goblins, did you change the post id to SQLinject, well rip</h2>";
            }
        }
        ?>
        
        
    </body>
</html>
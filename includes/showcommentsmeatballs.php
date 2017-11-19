<?php
include_once 'dbh2.php';

function getCommentsMeatballs($conn) {
  $sql = "SELECT * FROM user_comments";
  $result = $conn->query($sql);
  while($row = $result->fetch_assoc()) {
    echo "<div class='thecomments'>";
    echo $row['user_comment_nr'].". ";
    echo $row['user_idd'];
    echo "<p id='commentid'>".$row['user_message']."</p>";
    include 'commentdeletion/deleteform.php';
    echo "</div>";
  }
}

<?php

if ($row['user_idd'] == $_SESSION['u_uid']){
  echo "<form class='delete-form' method='POST' action='includes/commentdeletion/delfunctions.php'>
          <input type='hidden' name='user_comment_nr' value='".$row['user_comment_nr']."'>
          <button type='sumbit' name='deleteCom'>Delete</button>
        </form>";
    }
    else {
      echo "";
    }

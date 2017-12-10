<div class="restriction">
</div>
<div class="commentbox">
    <form id="usrform" action="/pancakes.php" method="POST">
        <button name="submit" type="submit">submit</button>
    </form>
    <textarea name="txtarea" form="usrform"> </textarea>
</div>
<div class='thecomments'>
    <?php

    use TastyRecipes\Controller\SessionManager;

    $controller = SessionManager::getController();
    $arr = $controller->getComments(2);
    $commentNumberIndex = 0;
    $commentAuthorIndex = 1;
    $commentIndex = 2;
    while (!empty($arr[$commentNumberIndex])) {
        echo "<div>";
        echo " <p id='commentid'></p>";
        echo $arr[$commentNumberIndex] . ". " . $arr[$commentAuthorIndex];
        echo "<p>" . $arr[$commentIndex] . "</p>";
        if (isset($_SESSION['u_id'])) {
            if ($arr[$commentAuthorIndex] == $_SESSION['u_uid']) {
                echo "<form class='delete-form' method='POST' action='/deletecommentP.php'>
                <input type='hidden' name='user_comment_nr' value='" . $arr[$commentNumberIndex] . "'>
                <button type='sumbit' name='deleteCom'>Delete</button>
              </form>";
            }
        }
        echo "</div>";
        $commentNumberIndex += 3;
        $commentAuthorIndex += 3;
        $commentIndex += 3;
    }
    SessionManager::storeController($controller);
    ?>
</div>

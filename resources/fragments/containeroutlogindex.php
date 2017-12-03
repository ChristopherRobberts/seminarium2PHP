<?php
use TastyRecipes\Util\Util;
?>
<div class="contrast">
  <div class="contain">
      <form action="/login.php" method="POST">
            <div class="container">
              <label><b>Username</b></label>
              <input type="text" name="uname" placeholder="Enter User Name Here" required>
              <label><b>Password</b></label>
              <input type="password" name="psw" placeholder="Enter Password Here" required>
            </div>
          <div class="submitbtn">
            <button name="submit" type="submit">Log in</button>
          </div>
      </form>
      <?php
      if (isset($exception)){
          echo $exception->getMessage();
      }
      ?>
    </div>
</div>

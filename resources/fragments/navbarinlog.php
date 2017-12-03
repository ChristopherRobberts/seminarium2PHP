<div class="topofpage">
  <div class="links">
    <ul>
      <li><a href="/">Home</a></li>
      <li><a href="meatballs.php">Swedish Meatballs</a></li>
      <li><a href="pancakes.php">Pancakes</a></li>
      <li><a href="Calendar.php">Calendar</a></li>
    </ul>
  </div>
  <div id="rightlink">
    <?php
    echo "<div class='visibilitystatus'>You are logged in as: ".$_SESSION['u_uid']."</div>";
    ?>
      <ul>
        <li><form action="/logout.php" method="POST">
           <button name="outlog" type="submit">Log out</button>
            </form>
        </li>
      </ul>
  </div>
</div>

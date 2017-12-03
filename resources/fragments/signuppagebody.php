<div class="contrast">
  <div class="contain">
    <form action="/signuppage.php" method="POST">
      <div class="container">
        <label><b>First Name</b></label>
        <input type="text" name="fname" placeholder="Enter First Name Here">
        <label><b>Last Name</b></label>
        <input type="text" name="lname" placeholder="Enter Last Name Here">
        <label><b>Username</b></label>
        <input type="text" name="uname" placeholder="Enter Username Here">
        <label><b>Email Adress</b></label>
        <input type="text" name="email" placeholder="Enter E-mail Adress Here">
        <label><b>Password</b></label>
        <input type="password" name="psw" placeholder="Enter Password Here">
        <div class="submitbtn">
          <button name="submit" type="submit">Sign up</button>
        </div>
      </div>
    </form>
      <?php
      if(isset($exception)){
          echo $exception->getMessage();
      }
      ?>
  </div>
</div>

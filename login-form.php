<?php
session_start();
if (isset($_SESSION['flag'])){
    header('Location: logout.php');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login Form </title>
    <link rel="stylesheet" href="login-form.css">
  </head>
  <body>

    <div class="login-box">
      <!---<img src="images/circle_logo.png" class="avatar" alt="Avatar Image">--->
	  <a href="index.php">
			<img src="images/circle_logo.png" class="avatar" alt="Avatar Image">
			</a>
      <h1>Login Here</h1>
      <form action="validate-login.php" method="post">
          <?php
          if(isset($_SESSION['error']['login_error'])){
              $error = $_SESSION['error']['login_error'];
              echo "<span>$error</span>";
          }
          ?>
        <label for="username">Username</label>
        <input id="username" name="username" type="text" placeholder="Enter Username">
        <?php
            if(isset($_SESSION['error']['username_error'])){
                $error = $_SESSION['error']['username_error'];
                echo "<span>$error</span>";
            }
        ?>
        <label for="password">Password</label>
        <input id="password" name="password" type="password" placeholder="Enter Password">
          <?php
          if(isset($_SESSION['error']['password_error'])){
              $error = $_SESSION['error']['password_error'];
              echo "<span>$error</span>";
          }
          ?>
        <input type="submit" value="Log In">
        <a href="forgot-password.php">Forgot your password?</a><br>
        <a href="signup.php">Don't have an account?</a>
      </form>
      
    </div>
  </body>
</html>

<?php
unset($_SESSION['error']);
unset($_SESSION['success']);
?>
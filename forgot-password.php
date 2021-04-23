<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Forgot Password</title>
        <link rel="stylesheet" href="login-form.css">
    </head>
    <body>
        <div class="login-box">
            <!---<img src="images/circle_logo.png" class="avatar" alt="Avatar Image">--->
			<a href="index.php">
			<img src="images/circle_logo.png" class="avatar" alt="Avatar Image">
			</a>
            <h1>Forgot Password</h1>
            <form action="validate-forgot-password.php" method="post">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" placeholder="Enter email address">
                <?php
                if(isset($_SESSION['error']['email_error'])){
                    $error = $_SESSION['error']['email_error'];
                    echo "<span>$error</span>";
                }
                ?>
                <input type="submit" value="Submit">
                <?php if (!isset($_SESSION['flag'])){
                    echo "<a href=\"signup.php\">Don't have an account?</a>";
                }
                ?>
            </form>
        </div>
    </body>
</html>

<?php
unset($_SESSION['error']);
unset($_SESSION['success']);
?>


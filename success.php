<?php
session_start();
require('database.php');

?>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <title>Success</title>
            <link rel="stylesheet" href="login-form.css">
        </head>
        <body>
            <div>
                <h1><?php echo $_SESSION['success']['message'] ?></h1>
                <?php
                    if($_SESSION['success']['link'] == 'login'){
                        echo '<a href="login-form.php">Log in</a>';
                    }
                    else{
                        echo '<a href="index.php">Go home</a>';
                    }
                ?>
                <ul>

                </ul>
            </div>
        </body>
</html>

<?php
unset($_SESSION['error']);
unset($_SESSION['success']);
?>
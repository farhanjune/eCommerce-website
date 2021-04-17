<?php
require('database.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>BuyTech</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
    <body>
        <main>
            <h1>Database Error</h1>
            <p>There was an error connecting to the database.</p><br>
            <p>Error message: <?php echo $error_message; ?></p>
        </main>
    </body>
</html>
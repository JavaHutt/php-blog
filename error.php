<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $website_title = '404';
        require 'blocks/head.php';
    ?>
</head>
<body>
    <?php
        include 'blocks/header.php';
    ?>
    <h1>Error 404</h1>
    <span>Return to <a href="/index.php">homepage</a></span>
    <?php
        include 'blocks/footer.php';
    ?>
</body>
</html>
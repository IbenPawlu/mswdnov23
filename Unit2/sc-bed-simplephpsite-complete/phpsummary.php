<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php' ?>


<body>
    <?php include 'includes/menu.php' ?>

    <div class="container">
        <H1>PHP Summary</h1>
        <?php
            printf("<p>You are running PHP version %s", phpversion());

            $currentFile = $_SERVER['PHP_SELF'];
            printf('<p>The current file name is %s </p>', $currentFile);
            $clientIP = $_SERVER['REQUEST_URI'];
            echo "<h3>THIS: $clientIP</h3>";
            $clientHost = $_SERVER['REMOTE_PORT'];
            echo printf("<p>Client is using port %d ",$clientHost);

            echo "<h4>Loaded Extensions</h4>";
            $ext = get_loaded_extensions();
            var_dump($ext);

            echo "<h4>Server Environment</h4>";
            var_dump($_SERVER);
        ?>

    </div>

    <?php include 'includes/footer.php' ?>

</body>
</html>
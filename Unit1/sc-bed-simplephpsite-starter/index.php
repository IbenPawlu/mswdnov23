<?php
    $phpReleaseDate = new DateTime('1995-06-08');
    $phpAge = $phpReleaseDate->diff(new DateTime());
    $currentDate = new DateTime();
?>

<!doctype html>
<html lang="en">
<?php include 'includes/head.php' ?>

<body>
    <?php include 'includes/menu.php' ?>
    <div class="container">
        <h1>Learning PHP</h1>
        <p>Welcome to the <strong>Learning PHP</strong> home page!</p>
        <p>Select a link above to start learning. about a language with <?=$phpAge->y?> years and <?=$phpAge->m?> months of heritage!</p>
    </div>
    
    <?php echo 'PHP Release Date: ' . $phpReleaseDate->format('Y-m-d') . '<br>';?>
    <?php echo 'Current Date: ' . $currentDate->format('Y-m-d') . '<br>'; ?>
</body>

</html>
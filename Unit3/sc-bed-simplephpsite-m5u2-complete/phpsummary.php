<!doctype html>
<html lang="en">

<?php include 'includes/head.php' ?>

<body <?= isset($_COOKIE['darkmode']) && $_COOKIE['darkmode'] === 'true' ? 'data-bs-theme="dark"' : '' ?>>
    <?php include 'includes/menu.php' ?>

    <div class="container">
        <h1>PHP Summary</h1>
        <?php
            printf('<p>You are running PHP %s</p>', phpversion());
            
            //Looping with Array
            $camfam = ['Keith', 'Joanne', 'Paul', 'Abigail'];
            foreach($camfam as $name){
            echo "<p>The members are: $name</p>";
            }

            // Loop
            $huntingSeason = 30;
            $currentDay = 25;
            while ($currentDay <= $huntingSeason) {
                if ($currentDay === $huntingSeason) {
                    echo "<p>Today is the last day to hunt</p>";
                } else {
                    $remainingDays = $huntingSeason - $currentDay;
                    echo "<p>Today is day: $currentDay/$huntingSeason of the hunting season. I have $remainingDays days left to hunt!</p>";
                }
                $currentDay++;
            }
            
            while ($currentDay <= $huntingSeason + 12) {
                $daysOver = $currentDay - $huntingSeason;
                echo "<p>It's $daysOver day/s past the ending date, that means that you are not allowed to hunt</p>";
                $currentDay++;
            }
            // Extra
            echo $_SERVER['SCRIPT_NAME'];
        ?>

        <div class="card">
            <div class="card-header">
                Loaded Extensions
            </div>
            <div class="card-body">
                <?php
                foreach(get_loaded_extensions() as $ext) {
                    echo "<span class='badge text-bg-info' style='margin:2px;'>$ext</span>";
                }
                 ?>
            </div>
        </div>

        <div class="card" style="margin-top: 10px;">
            <div class="card-header">
                Server Environment
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Key</th>
                            <th>Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($_SERVER as $key => $value){
                            echo "<tr><td>$key</td><td>$value</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include 'includes/footer.php' ?>
</body>

</html>
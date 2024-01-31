<?php
$menuItems = [
    ['name' => 'Testing Area', 'url' => '/home.php'],
    ['name' => 'Student DB', 'url' => '/includes/main.inc.php']
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <ul>
        <?php
        foreach($menuItems as $items){
            $isActive = $items['url'] === $_SERVER['PHP_SELF'] ? "active" : "";
            echo <<<ITEMS
        <li ><a class="nav-link $isActive" href="{$items['url']}">{$items['name']}</a></li>
        ITEMS;
        }
        ?>
        
    </ul>  
</body>
</html>
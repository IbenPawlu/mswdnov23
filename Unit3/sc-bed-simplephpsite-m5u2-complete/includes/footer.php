<?php
$socials = [
    ['name' => 'Twitter', 'url' => 'https://twitter.com/icemalta', 'logo' => 'bi-twitter-x'],
    ['name' => 'Instagram', 'url' => 'https://www.instagram.com/icemalta', 'logo' => 'bi-instagram'],
    ['name' => 'Facebook', 'url' => 'https://www.facebook.com/icemalta/', 'logo' => 'bi-facebook']
];
?>

<div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <a href="https://icemalta.com" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
                <i class="bi-rocket-takeoff" style="font-size: 1.5rem;"></i>
            </a>
            <span class="mb-3 mb-md-0 text-body-secondary">©
                <?= date('Y') ?> ICE Malta
            </span>
        </div>

        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <?php
            foreach ($socials as $social){
            echo <<< LIST
                <li class="ms-3">
                <a class="text-body-secondary" target="_blank" href="{$social['url']}"><i class="{$social['logo']}"
                style="font-size: 1.5rem;"></i> </a>
                </li>
            LIST;
            }
            ?>
        </ul>

    </footer>
</div>
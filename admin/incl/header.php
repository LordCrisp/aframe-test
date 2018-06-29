<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#E91E63" id="theme_color">
    <title>BamCMS | <?= $pageTitle ?> <?= $pageSection = isset($pageSection) ? $pageSection : ""; ?></title>
    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="/admin/assets/css/master.css">
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>

    <!-- Shouldn't do styling here... but for educational purposes, who cares -->
    <style>h6, h1 {
            display: inline-block;
            padding-right: 16px;
        }

        .align-right {
            text-align: right;
        }
    </style>

</head>

<!-- BODY (start) -->
<body>
<!-- HEADER (start) -->
    <header class="navbar__main">
        <div class="navbar__main--top">
            <!-- BamCMS Logo (start) -->

            <svg width="100px" height="65px" viewBox="0 0 63 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="LogoPlaceholder">
                    <ellipse id="Ellipse" cx="9" cy="7.5" rx="9" ry="7.5" transform="translate(45)" fill="white"/>
                    <ellipse id="Ellipse_2" cx="9" cy="7.5" rx="9" ry="7.5" transform="translate(1)" fill="white"/>
                    <g id="LogoPlaceholder_2" filter="url(#filter0_d)">
                        <ellipse cx="30" cy="20" rx="30" ry="20" transform="translate(1 3)" fill="white"/>
                    </g>
                </g>
                <defs>
                    <filter id="filter0_d" x="0" y="1" width="62" height="42" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 255 0"/>
                        <feOffset dy="-1"/>
                        <feGaussianBlur stdDeviation="0.5"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 0.8 0 0 0 0 0.8 0 0 0 0 0.8 0 0 0 0.25 0"/>
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
                    </filter>
                </defs>
            </svg>
            <!-- BamCMS Logo (end) -->

            <h2>BamCMS</h2>
            <hr>
        </div>

        <!-- Main Navigation (start) -->
        <nav>
            <ul>
                <!-- BUILD THIS TO DRAW FROM DATABASE LATER!!!
                    DB names: "url, text_dk, text_en, access_requirement" -->
                <li><a href="/admin/index.php"><i class="material-icons">home</i>Forside</a></li>
                <li><a href="/admin/users.php"><i class="material-icons">people</i>Brugere</a></li>
                <li><a href="/admin/products.php"><i class="material-icons">add_shopping_cart</i>Produkter</a></li>
                <li><a href="/admin/news.php"><i class="material-icons">mail</i>Nyheder</a></li>
            </ul>
        </nav>
        <!-- Main Navigation (end) -->
        <!-- Bottom Navigation (start) -->
        <nav class="navbar__main--bottom">
            <ul>
                <li><a href="?logout=1">Log Ud</a></li>
                <li><a href="<?= ADMINROOT ?>manual.php">Manual</a></li>
                <li><a href="<?= ADMINROOT ?>about.php">Om</a></li>
            </ul>
        </nav>
    </header>
<!-- HEADER (end) -->
<main>
    <div class="content__top">
            <?php
            if (isset($mode)) {
                echo "<nav>";
                if ($mode != "LIST") {echo "<a href='?mode=list'><h6>Tilbage Til Liste</h6></a>";}
                if ($mode == "DETAILS") {echo "<a href='?mode=edit&id=$id'><h6>Rediger Produkt</h6></a>";}
                if ($mode != "EDIT" && !$id) {echo "<a href='?mode=edit'><h6>Tilføj Nyt Produkt</h6></a>";}
                if ($mode == "EDIT" && $id) {echo "<a href='?mode=details&id=$id'><h6>Tilbage Til Detaljer</h6></a>";}
                echo "</nav>";
            }?>
        <h1><?php echo "$pageTitle $pageSection"; ?></h1>
    </div>
    <hr>
    <section class="content__main">
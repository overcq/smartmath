<?php
    require_once "../libs/login/scripts/0.php";
    if (!session_start() || !isset($_SESSION['user_id'])) {
        header("Location: https://$domain_dziennik/");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="pl-pl">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="smartmath dziennik - strona logowania">
        <meta name="keywords" content="smartmath, dziennik, szkoła, school">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preconnect" href="https://<?= $domain_cdn ?>">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Oxygen:wght@400;700&display=swap">
        <link rel="stylesheet" href="https://<?= $domain_cdn ?>/libs/home/styles/home.css">
<!--
        <link rel="stylesheet" href="home.css">
-->
        <title>Home | smartmath</title>
        <base href="https://<?= $domain_dziennik ?>">
    </head>
    <body>
        <div class="container">
            <div class="navigation">
                <a href="/oceny/" class="tilelink"><i class="icon-user"></i><br><div class="tile1">Oceny</div></a>
                <a href="/zadania-domowe/" class="tilelink"><i class="icon-user"></i><br><div class="tile2">Zadania Domowe</div></a>
                <a href="/frekwencja/" class="tilelink"><i class="icon-user"></i><br><div class="tile2">Frekwencja</div></a>
                <a href="/kartkowki-i-sprawdziany/" class="tilelink"><i class="icon-user"></i><br><div class="tile3">Kartkówki i sprawdziany</div></a>
                <a href="/wiecej-opcji/" class="tilelink"><i class="icon-user"></i><br><div class="tile3">Więcej opcji</div></a>
                <a href="/plan-lekcji/" class="tilelink"><i class="icon-user"></i><br><div class="tile5">Mój plan lekcji</div></a>
                <div class="clear_both"></div>
            </div>
        <script src="https://<?= $domain_cdn ?>/libs/home/scripts/clock.js"></script>
        </div>
    </body>
</html>

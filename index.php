<?php
    require_once "dziennik/libs/login/scripts/0.php";
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
        <link rel="stylesheet" href="https://<?= $domain_dziennik ?>/libs/login/styles/login.css?20220127">
        <link rel="stylesheet" href="https://<?= $domain_cdn ?>/libs/login/styles/login.css?20220127">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
        <title>Błąd | smartmath</title>
    </head>
    <body>
        <div class="container">
            <div class="login_form">
                <h2>Błąd</h2>
                <br>
                Nie podałeś poprawnego adresu szkoły lub podany adres nie istnieje<br> w systemie. Adres powinien mieć następującą postać:<br>
                https://<?= $domain_dziennik ?>/<b>nazwaszkoły</b><br><br>
                Aby uzyskać aktualny adres, zgłoś się do swojej szkoły.
                <a href="https://www.<?= $domain ?>/"><input type="submit" value="Przejdź na stronę główną"></a>
            </div>
        </div>
    </body>
</html>

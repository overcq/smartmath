<?php
    require_once "libs/login/scripts/0.php";
    session_start();
    if (!isset($_SESSION['user_id'])) {
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
        <link rel="stylesheet" href="https://<?= $domain_cdn ?>/libs/lhome/styles/home.css">
        <title>Moje dane | smartmath</title>
    </head>
    <body>
        <div class="container">
            <?php
                $connection = @new mysqli( $db_host, $db_user, $db_pass, $db_name);
                if ($connection->connect_errno) {
                    die('Błąd: '.$connection->connect_errno.' Nie udało się połączyć z bazą danych.');
                }
                $sql = 'SELECT * FROM users WHERE id='._SESSION['user_id'];
                $result = $connection->query($sql);
                $row = $result->fetch_assoc();
                $name = $_SESSION['imie'];
                $surname = $_SESSION['nazwisko'];
                $email = $_SESSION['email']
                $tel = $_SESSION['tel']
                $result->close();
                $connection->close();
            ?>
            <p>Witaj <?= $name ?></p>
            <table>
                <tbody>
                    <tr><th>Imię i nazwisko:</th><td><?= $name ?> <?= $surname ?></td></tr>
                    <tr><th>Adres e-mail:</th><td><?= $email ?></td></tr>
                    <tr><th>Numer telefonu:</th><td>+48 <?= $tel ?></td></tr>
                </tbody>
            </table>
        </div>
    </body>
</html>

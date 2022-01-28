<?php
    session_start();
    if(!isset($_SESSION['logged']))
    {
        header('Location: https://dziennik.smartmath.pl/sp1wegrow/');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pl-pl">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="smartmath dzinenik - strona logowania">
        <meta name="keywords" content="smartmath, dzinenik, szkoła, school">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preconnect" href="https://cdn.smartmath.pl">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Oxygen:wght@400;700&display=swap">
        <link rel="stylesheet" href="https://cdn.smartmath.pl/libs/lhome/styles/home.css">
        <title>Moje dane | smartmath</title>
    </head>
    <body>
        <div class="container">
            <?php 
                echo "Witaj ".$_SESSION['imie'];

                echo "<h3>Imię i nazwisko:"."<b>".$_SESSION['imie']." ".$_SESSION['nazwisko']."</b></h3>"; echo "<br>";
                echo "<h3>Adres e-mail:"."<b>".$_SESSION['email']."</b></h3>"; echo "<br>";
                echo "<h3>Numer telefonu:"."<b>"."+48 ".$_SESSION['tel']."</b></h3>";
            ?>
        </div>
    </body>
</html>
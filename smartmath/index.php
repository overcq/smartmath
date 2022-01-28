<?php
	session_start();
    if((isset($_SESSION['logged'])) && ($_SESSION['logged']==true))
    {
        header('Location: https://dziennik.smartmath.pl/sp1wegrow/home/');
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
        <link rel="stylesheet" href="https://cdn.smartmath.pl/libs/login/styles/login.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
        <title>Logowanie | smartmath</title>
    </head>
    <body>
        <div class="container">
            <div class="login_form">
                <h2>Zaloguj się do systemu</h2>
                <br>
                <form action="https://dziennik.smartmath.pl/" method="post">
                    <input type="email" name="email" placeholder="Adres e-mail" autocomplete="email" required="required">
                    <input type="password" name="password" placeholder="Hasło" autocomplete="current-password" required="required" id="id_password">
                    <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
                    <input type="submit" value="Zaloguj się">
                    <?php 
                        if(isset($_SESSION['login_error']))
                        {
                            echo $_SESSION['login_error']; 
                        }
                    ?>
                </form>
                <div class="reset_pass"><br>
                    <a href="https://dziennik.smartmath.pl/resetuj-haslo/">Nie pamiętasz hasła?</a> | 
                    <a href="https://dziennik.smartmath.pl/pomoc/">Pomoc i kontakt</a>
                </div>
            </div>
            <script src="https://cdn.smartmath.pl/libs/login/scripts/login.js"></script>
        </div>
    </body>
</html>

<?php
    require_once "/libs/login/scripts/00_dev_db.php";
    $connection = @new mysqli($db_host, $db_user, $db_pass, $db_name);
    if ($connection->connect_errno!=0)
    {
        echo"Błąd: ".$connection->connect_errno."Nie udało się połączyć z bazą danych.";
    }
    else
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $sql = "SELECT * FROM users WHERE email='$email' AND pass='$password'";
        if($result = @$connection->query($sql))
        {
            $records = $result->num_rows;
            if($records>0)
            {
                $_SESSION['logged'] = true;
                $row = $result->fetch_assoc();
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['imie'] = $row['imie'];
                $_SESSION['nazwisko'] = $row['nazwisko'];
                $_SESSION['rola'] = $row['rola'];
                $_SESSION['du'] = $row['du'];
                $_SESSION['tel'] = $row['tel'];

                unset($_SESSION['login_error']);
                $result->close();
                header('Location: https://dziennik.smartmath.pl/home/');
            } else {
                $_SESSION['login_error'] = '<span style="color: red; text-algin: center;">Nieprawidłowy adres e-mail lub hasło.</span>';
                header('Location: https://dziennik.smartmath.pl/');
            }
        }
        $connection->close();
    }
?>
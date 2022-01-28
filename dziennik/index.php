<?php
    require_once "libs/login/scripts/0.php";
	session_start();
    if (isset($_SESSION['id'])) {
        header("Location: https://$domain_1/sp1wegrow/home/");
        exit();
    }
    if (!$_POST) {
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
        <link rel="stylesheet" href="https://<?= $domain_cdn ?>/libs/login/styles/login.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
        <title>Logowanie | smartmath</title>
    </head>
    <body>
        <div class="container">
            <div class="login_form">
                <h2>Zaloguj się do systemu</h2>
                <br>
                <form action="/" method="post">
                    <input type="email" name="email" placeholder="Adres e-mail" autocomplete="email" required="required">
                    <input type="password" name="password" placeholder="Hasło" autocomplete="current-password" required="required" id="id_password">
                    <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
                    <input type="submit" value="Zaloguj się">
                    <?php 
                        if (isset($_SESSION['login_error'])) {
                            echo $_SESSION['login_error']; 
                        }
                    ?>
                </form>
                <div class="reset_pass"><br>
                    <a href="resetuj-haslo">Nie pamiętasz hasła?</a> | 
                    <a href="pomoc">Pomoc i kontakt</a>
                </div>
            </div>
            <script src="https://<?= $domain_cdn ?>/libs/login/scripts/login.js"></script>
        </div>
    </body>
</html>

<?php
    } else {
        $connection = @new mysqli( $db_host, $db_user, $db_pass, $db_name);
        if ($connection->connect_errno) {
            die('Błąd: '.$connection->connect_errno.' Nie udało się połączyć z bazą danych.');
        }
        $email = $_POST['email'];
        $password = $_POST['password'];
        $stmt = $connection->prepare( 'SELECT id FROM users WHERE email=? AND pass=?' ) or die('Unable to prepare statement.');
        $stmt->bind_param( 'ss', $email, $password );
        if (@$stmt->execute()) {
            $result = $stmt->get_result();
            $records = $result->num_rows;
            if (!$records) {
                header("Location: https://$domain_dziennik/");
?>
                <span style="color: red; text-algin: center;">Nieprawidłowy adres e-mail lub hasło.</span>
<?php
            } else {
                $row = $result->fetch_assoc();
                $_SESSION['id'] = $row['id'];
                $result->close();
                header("Location: https://$domain_dziennik/home/");
            }
        }
        $connection->close();
    }

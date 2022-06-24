<?php
    require_once "libs/login/scripts/0.php";
    session_start();
    if (isset($_SESSION['user_id'])) {
        header("Location: https://$domain_dziennik/home/");
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
                        <span style="color: red; text-algin: center;">
                            <?php
                                if (isset($_SESSION['login_error'])) {
                                    echo htmlentities( $_SESSION['login_error'], ENT_HTML5, 'UTF-8' );
                                    unset($_SESSION['login_error']);
                                }
                            ?>
                        </span>
                </form>
                <div class="reset_pass"><br>
                    <a href="resetuj-haslo/">Nie pamiętasz hasła?</a> | 
                    <a href="pomoc/">Pomoc i kontakt</a>
                </div>
            </div>
            <script src="https://<?= $domain_cdn ?>/libs/login/scripts/login.js"></script>
        </div>
    </body>
</html>
<?php
    } else {
        if (!isset($_POST['email']) || !isset($_POST['password'])) {
            die('Błąd: niepoprawny formularz.');
        }
        $connection = @new mysqli( $db_host, $db_user, $db_pass, $db_name);
        if ($connection->connect_errno) {
            die('Błąd: '.$connection->connect_errno.' Nie udało się połączyć z bazą danych.');
        }
        $stmt = $connection->prepare( 'SELECT id FROM users WHERE email=? AND pass=?' );
        $stmt->bind_param( 'ss', $_POST['email'], $_POST['password'] );
        if (@$stmt->execute()) {
            $result = $stmt->get_result();
            if (!$result->num_rows) {
                $_SESSION['login_error'] = 'Nieprawidłowy adres e-mail lub hasło.';
                header("Location: https://$domain_dziennik/");
                exit();
            }
            unset($_SESSION['login_error']);
            $row = $result->fetch_assoc();
            $_SESSION['user_id'] = $row['id'];
            $result->close();
            header("Location: https://$domain_dziennik/home/");
        }
        $connection->close();
    }

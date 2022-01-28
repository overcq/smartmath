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
        <title>Resetuj hasło | smartmath</title>
    </head>
    <body>
        <div class="container">
            <div class="login_form">
                <h2>Aby zresetować hasło, wpisz adres e-mail powiązany z kontem.</h2>
                <br>
                <form action="https://dziennik.smartmath.pl/sp1wegrow/resetuj-haslo/wyslano/" method="post">
                    <input type="email" name="email" placeholder="Adres e-mail" autocomplete="email" required="required">
                    <input type="submit" value="Resetuj hasło">
                </form>
                <div class="reset_pass"><br>
                    <a href="'https://dziennik.smartmath.pl/sp1wegrow/">Logowanie</a> | 
                    <a href="https://dziennik.smartmath.pl/pomoc/">Pomoc i kontakt</a>
                </div>
            </div>
        </div>
    </body>
</html>
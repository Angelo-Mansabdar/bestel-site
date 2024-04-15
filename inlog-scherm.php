<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/style.css" type="text/css" />

    <title>Inloggen</title>
</head>

<body>
    <main>

        <div class="form-container">
            <div class="form-wrapper">
                <h2>Registratie</h2>
                <form class="start-forms" method="post" action="register.php">

                    <label for="username_reg">Gebruikersnaam:</label><br>
                    <input type="text" name="username" required><br>

                    <label for="email_reg">E-mail:</label><br>
                    <input type="email" name="email" required><br>

                    <label for="password_reg">Wachtwoord:</label><br>
                    <input type="password" name="password" required><br>

                    <input type="submit" name="register" value="Registreren">
                </form>
            </div>

            <div class="form-wrapper">
                <h2>Login</h2>
                <form class="start-forms" method="post" action="inloggen.php">

                    <label for="username">Gebruikersnaam:</label><br>
                    <input type="text" id="username" name="username" required><br>

                    <label for="password">Wachtwoord:</label><br>
                    <input type="password" id="password" name="password" required><br>

                    <input id="submit-align" type="submit" name="login" value="Login">

                </form>
            </div>
        </div>


    </main>
</body>

</html>
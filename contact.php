<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/style.css" type="text/css" />
    <title>Contactformulier</title>
</head>

<body>
    <?php
    session_start();
    include('connections.php');
    function isAdmin()
    {
        return isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === "admin";
    }
    $header_to_include = isAdmin() ? 'admin-header.php' : 'header.php';
    include($header_to_include);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $naam = $_POST['naam'];
        $email = $_POST['email'];
        $bericht = $_POST['bericht'];
        $query = "INSERT INTO messages (naam, email, bericht) VALUES (:naam, :email, :bericht)";
        $statement = $conn->prepare($query);
        $statement->execute(array(':naam' => $naam, ':email' => $email, ':bericht' => $bericht));
        echo "<p>Bedankt voor uw bericht. We nemen zo snel mogelijk contact met u op.</p>";
        $conn = null;
        header("Location: home.php");
        exit;
    }
    $conn = null;
    ?>
    <main>
        <h2 class="h2-form">Neem contact met ons op</h2>
        <form class="form-align" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            Naam: <input type="text" name="naam"><br><br>
            E-mail: <input type="email" name="email"><br><br>
            Bericht:<br>
            <textarea name="bericht" rows="5" cols="40"></textarea><br><br>
            <input type="submit" value="Verstuur">
        </form>
    </main>
    <?php
    include('footer.php');
    ?>
</body>

</html>
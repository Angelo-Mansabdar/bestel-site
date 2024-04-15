<?php
include('connections.php');

if (isset($_POST['register'])) {
    // Gebruikersnaam, emailadres en wachtwoord van het formulier ophalen
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        // Controleer eerst of de gebruikersnaam al bestaat
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $usernameExists = $stmt->fetch();

        // Controleer of het e-mailadres al in gebruik is
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $emailExists = $stmt->fetch();

        // Als de gebruikersnaam of het e-mailadres al in gebruik is, geef dan een foutmelding weer
        if ($usernameExists) {
            echo "Gebruikersnaam is al in gebruik.";
            header("Location: inlog-scherm.php");
        } elseif ($emailExists) {
            echo "E-mailadres is al in gebruik.";
            header("Location: inlog-scherm.php");
        } else {
            // Voer de registratie uit als zowel de gebruikersnaam als het e-mailadres uniek zijn
            $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);

            $test = $stmt->execute();
            echo "Registratie succesvol!";
            var_dump($test);
            if ($test) {
                header("Location: inlog-scherm.php");
            }
        }
    } catch (PDOException $e) {
        echo "Registratie mislukt: " . $e->getMessage();
        header("Location: inlog-scherm.php");
    }
}


<?php

include('connections.php');


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    // Gebruikersnaam en wachtwoord van het formulier ophalen
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        
        $stmt = $conn->prepare("SELECT id, username, password, is_admin FROM users WHERE username = :username AND password = :password");
        //SELECT password is om te testen of die checkt
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);

        // Uitvoeren van de query
        $result = $stmt->execute();

        // Controleren of er resultaten zijn
        $data = $stmt->fetch();

        if ($result) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $data['username'];
            
            if ($data['is_admin'] == 1) {
                $_SESSION['is_admin'] = 'admin'; // Sla op of de gebruiker een admin is
                header("Location: admin-pagina.php");
            } else {
                header("Location: home.php");
            }
            exit();
        } else {
            // Ongeldige inloggegevens
            echo "Ongeldige gebruikersnaam of wachtwoord.";
        }
    } catch (PDOException $e) {
        echo "Fout bij het inloggen: " . $e->getMessage();
    }
}

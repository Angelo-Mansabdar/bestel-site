<?php
// Verbinding maken met de database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webapp01";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connectie mislukt: " . $e->getMessage();
}

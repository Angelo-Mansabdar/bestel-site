<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webapp01";

try
{
    $conn = new PDO("mysql:host=$servername;dbname=webapp01", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection succesfull";
}
catch (PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}

$stat = $conn->prepare("SELECT gebruikersnaam, wachtwoord FROM users");
$stat->execute();


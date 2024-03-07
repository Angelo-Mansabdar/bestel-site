<?php

global $conn;
include('connections.php'); // Include the database connection file
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$stat = $conn->prepare("SELECT * FROM users WHERE gebruikersnaam = :gebruikersnaam AND wachtwoord = :wachtwoord");

$result = $stat->fetch();

if (isset($result))
{
    echo " - logged in";
}
else
{
    echo " - false login";
}


echo ["gebruiksnummer"];
echo ["gebruikersnaam"];
echo ["wachtwoord"];
 

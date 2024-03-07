<?php

global $conn;
include 'connections.php';

$user= $_POST['username'];
$pass= $_POST['password'];

$sql = "INSERT INTO users ( gebruikersnaam, wachtwoord)VALUES ('$user', '$pass')";
$conn->exec($sql);
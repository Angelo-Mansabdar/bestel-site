<?php
include('connections.php');

session_start();

// Destroy the session to log out the user
session_destroy();

// Redirect the user to the login page or another appropriate page
header("Location: inlog-scherm.php");
exit;

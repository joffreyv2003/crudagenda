<?php
// Foutmeldingen
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database logingegevens
$db_hostname = 'localhost';
$db_username = '';
$db_password = '';
$db_database = '';

// Voer jouw database gegevens hierboven in.

// Database connectie
$mysqli = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

// Als de verbinding niet gemaakt kan worden
if (!$mysqli) {
    echo "FOUT: Connectie kan niet worden gemaakt. <br>";
    echo "Error: " . mysqli_connect_error() . "<br/>";
    exit;
}
?>
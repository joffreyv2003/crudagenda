<?php

// Start de sessie
session_start();

$_SESSION['username'] = null;

// Verwijder de sessie
session_destroy();

// Ga naar de agenda
header("Location:toonagenda.php");

?>
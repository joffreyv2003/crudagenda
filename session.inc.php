<?php

// Start de sessie
session_start();

if (!isset($_SESSION['username'])) {
    header("location:inlogForm.html");
    exit;
}

?>
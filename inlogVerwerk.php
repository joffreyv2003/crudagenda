<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inloggen - PHP</title>
        <link rel="stylesheet" href="css/style.css">
    </head>

<body>
<?php

require 'config.php';

if (isset($_POST['verzend'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Controleer of alle formuliervelden zijn ingevuld
    if (strlen($username) > 0 && strlen($password) > 0) {

        // Versleutel het wachtwoord
        $password = sha1($password);

        $query = "SELECT * FROM users ";
        $query .= "WHERE username = '$username' AND password = '$password'";

        // Query uitvoeren
        $result = mysqli_query($mysqli, $query);

        if (mysqli_num_rows($result) == 1) {

            // Start de sessie
            session_start();

            // Sla de username op in een sessie
            $_SESSION['username'] = $username;

            // Stuur door naar de homepage
            header("location:toonagenda.php");

            echo "<p id='subtext'>Ingelogd!</p><br>";
        } else {
            echo "Naam en/of wachtwoord zijn fout.";
        }

    }
}

?>
</body>

</html>
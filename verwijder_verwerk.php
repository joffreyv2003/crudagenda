<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details - PHP</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    // Voeg de database toe
    require 'config.php';

    // Lees het sessie bestand
    require_once 'session.inc.php';

    $id = $_GET['id'];

    $query = "DELETE FROM crud_agenda WHERE ID = " . $id;

    // Voer de query uit en check of het 'resultaat' wordt opgevangen
    // [!] Het resultaat geeft aan of het wel of niet is gelukt ('true/false')
    $result = mysqli_query($mysqli, $query);

    // Geen ID gevonden
    if ($id = "") {
        echo "Geen ID gevonden..<br>";
    }

    // Controle
    if ($result) {
        echo "<p id='subtext'>Het item is verwijderd!</p><br>";
    } else {
        echo "FOUT! Het item kon niet verwijderd worden!";
        echo mysqli_error($mysqli);
    }

    // Terug naar overzicht
    echo "<a href='toonagenda.php' class='btn'>OVERZICHT <i class='bx:bar-chart'></i></a>";
    ?>
</body>

</html>
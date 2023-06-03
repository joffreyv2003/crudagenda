<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item toevoegen - PHP</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    // Voeg de database toe
    require 'config.php';

    // Lees het sessie bestand
    require_once 'session.inc.php';

    $query = "INSERT INTO crud_agenda";
    $query .= " (Onderwerp, Inhoud, Begindatum, Einddatum, Prioriteit, Status)";
    $query .= " VALUES ('MINOR algemeen', 'Opdracht afronden', '2022-02-17', '2022-02-18', 4, 'b')";

    // Voer de query uit en check of het 'resultaat' wordt opgevangen
    // [!] Het resultaat geeft aan of het wel of niet is gelukt ('true/false')
    $result = mysqli_query($mysqli, $query);

    // Controle
    if ($result) {
        echo "<p id='subtext'>Het item is toegevoegd!</p><br>";
    } else {
        echo "FOUT! Het item kon niet toegevoegd worden!";
        echo mysqli_error($mysqli);
    }

    // Terug naar overzicht
    echo "<a href='toonagenda.php' class='btn'>OVERZICHT <i class='bx:bar-chart'></i></a>";
    ?>
</body>

</html>
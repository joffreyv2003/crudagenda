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

    require 'config.php';

    // Lees het sessie bestand
    require_once 'session.inc.php';

    // Lees het id
    $id = $_GET['id'];

    // Maak de query aan
    $query = "SELECT * FROM crud_agenda WHERE ID = " . $id;

    // Voer de query uit
    $result = mysqli_query($mysqli, $query);

    if ($id != "") {

        // Item Check
        $item = mysqli_fetch_assoc($result);

        // Items
        $onderwerp = $item['Onderwerp'];
        $inhoud = $item['Inhoud'];
        $begindatum = $item['Begindatum'];
        $einddatum = $item['Einddatum'];
        $prioriteit = $item['Prioriteit'];
        $status = $item['Status'];

        // Toon de gegevens
        echo "<div class='card'>";
        echo "<h1 class='title3'>Informatie</h1>";
        echo "Onderwerp: " . $onderwerp . "<br>";
        echo "ID: " . $id . "</br><br>";
        echo "<div class='title2'>";
        echo "Inhoud: <br>";
        echo "</div>";
        echo $inhoud . "<br>";
        echo "</div><br><br>";

        echo "<div class='container'>";
        echo "<p class='warning'>Weet je het zeker?</p> <br/>";
        echo "<a href='verwijder_verwerk.php?id=" . $id . "' class='btn3'> JA </a> <a href='toonagenda.php' class='btn'>Terug <i class='bx:bar-chart'></i></a>";
        echo "</div>";
    } else {
        echo "Geen ID gevonden..<br>";
    }

    ?>
</body>

</html>
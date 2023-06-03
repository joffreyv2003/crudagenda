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

    include 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css';
    include 'https://www.encolumna.com/assets/vendor/bootstrap/css/bootstrap.min.css';
    include 'https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css';
    include 'https://www.encolumna.com/assets/vendor/glightbox/css/glightbox.min.css';
    include 'https://www.encolumna.com/assets/vendor/swiper/swiper-bundle.min.css';

    // Voeg de database toe
    require 'config.php';

    // Lees het sessie bestand
    require_once 'session.inc.php';

    // Lees het id uit
    $id = $_GET['id'];

    // Maak de query aan
    $query = "SELECT * FROM crud_agenda WHERE ID = " . $id;

    // Voer de query uit
    $result = mysqli_query($mysqli, $query);

    // Als er geen record is gevonden
    if (mysqli_num_rows($result) > 0) {

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
        echo $inhoud . "</br><br>";
        echo "Begindatum: " . $begindatum . "</br>";
        echo "Einddatum: " . $einddatum . "</br><br>";
        echo "Prioriteit: " . $prioriteit . "</br>";
        echo "Status: " . $status . "</br>";
        echo "</div><br>";
    } else {
        echo "Er is geen record met ID: " . $id . "<br>";
    }

    echo "<a href='toonagenda.php' class='btn'>OVERZICHT <i class='bx:bar-chart'></i></a> <a href='verwijder.php?id=" . $id . "' class='btn2'> Verwijder </a> <br/><br/>";
    ?>
</body>

</html>
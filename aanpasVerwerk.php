<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aanpassing verwerken..</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php

    require 'config.php';

    // Lees het sessie bestand
    require_once 'session.inc.php';

    // Check of er is verstuurd
    if (isset($_POST['verzend'])) {

        $id = $_POST['idVeld'];
        $ond = $_POST['onderwerpVeld'];
        $inh = $_POST['inhoudVeld'];
        $begin = $_POST['begindatumVeld'];
        $eind = $_POST['einddatumVeld'];
        $prior = $_POST['prioriteitVeld'];
        $stat = $_POST['statusVeld'];

        $query = "UPDATE crud_agenda";
        $query .= " SET Onderwerp = '{$ond}', Inhoud = '{$inh}', Begindatum = '{$begin}',";
        $query .= " Einddatum = '{$eind}', Prioriteit = '{$prior}', Status = '{$stat}'";
        $query .= " WHERE ID = {$id}";

        // Voer de query uit en check of het 'resultaat' wordt opgevangen
        // [!] Het resultaat geeft aan of het wel of niet is gelukt ('true/false')
        $result = mysqli_query($mysqli, $query);

        // Controle
        if ($result) {
            echo "<p id='subtext'>Het item is ge-update!</p><br>";
        } else {
            echo "FOUT! Het item kon niet ge-update worden!";
            echo $query . "<br>";
            echo mysqli_error($mysqli);
        }

        // Terug naar overzicht
        echo "<a href='toonagenda.php' class='btn'>OVERZICHT <i class='bx:bar-chart'></i></a>";
    } else {
        echo "Het formulier is niet (goed) verstuurd<br>";
    }
    ?>

</body>

</html>
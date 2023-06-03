<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Agenda - PHP</title>
        <link rel="stylesheet" href="css/style.css">
    </head>

<body>
<?php
    // Database verbinding
    require 'config.php';
    ;

    session_start();

    // Maak de query
    $query = "SELECT * FROM crud_agenda";

    // Uitvoering / resultaat
    $result = mysqli_query($mysqli, $query);

    // Als er geen resultaat is / Alleen voor developer1
    if (!$result) {
        echo "<p>FOUT!</p>";
        echo "<p>" . $query . "</p>";
        echo "<p>" . mysqli_error($mysqli) . "</p>";
        exit;
    }

    // Als er records zijn
    if (mysqli_num_rows($result) > 0) {

        echo "<h1 class='title'>Agenda - PHP</h1><br>";
        

    ?>

        <form action="" class="form-class2 rightS" name="agendaFilter" method="post">
            <h1 class="title4">Filter</h1>
            <div class="btn-flex">
                <button type="submit" name="verzendFilterDatum" class="btn4"><i class="bx bxs-paper-plane"></i> Datum</button>
                <button type="submit" name="verzendFilterPrioriteit" class="btn4"><i class="bx bxs-paper-plane"></i> Prioriteit</button>
                <button type="submit" name="verzendFilterStatus" class="btn4"><i class="bx bxs-paper-plane"></i> Status</button>
                <button type="submit" name="verzendFilter" class="btn4"><i class="bx bxs-paper-plane"></i> Prioriteit 1</button>
                <button type="submit" name="verzendFilterNiet" class="btn4"><i class="bx bxs-paper-plane"></i> Nog niet afgerond</button>
                <button type="submit" onclick="function verwijderFilter()" name="verwijderFilter" class="btn8"><i class="bx bxs-paper-plane"></i> Verwijder Filter</button>
            </div>
        </form>

    <?php

        // FILTERS
        
        // Filter op Datum
        $filterDatum = "SELECT * FROM `crud_agenda`";
        $filterDatum .= " ORDER BY `crud_agenda`.`Begindatum` DESC";

        if (isset($_POST['verzendFilterDatum'])) {
    
            // Voer de query uit en check of het 'resultaat' wordt opgevangen
            // [!] Het resultaat geeft aan of het wel of niet is gelukt ('true/false')
            $result = mysqli_query($mysqli, $filterDatum);

        }

        // Filter op Prioriteit
        $filterPrioriteit = "SELECT * FROM `crud_agenda`";
        $filterPrioriteit .= " ORDER BY `crud_agenda`.`Prioriteit` ASC";
        
        if (isset($_POST['verzendFilterPrioriteit'])) {
            
            // Voer de query uit en check of het 'resultaat' wordt opgevangen
            // [!] Het resultaat geeft aan of het wel of niet is gelukt ('true/false')
            $result = mysqli_query($mysqli, $filterPrioriteit);
        
        }

        // Filter op Status
        $filterStatus = "SELECT * FROM `crud_agenda`";
        $filterStatus .= " ORDER BY `crud_agenda`.`Status` ASC";
                
        if (isset($_POST['verzendFilterStatus'])) {
                    
            // Voer de query uit en check of het 'resultaat' wordt opgevangen
            // [!] Het resultaat geeft aan of het wel of niet is gelukt ('true/false')
            $result = mysqli_query($mysqli, $filterStatus);
                
        }

        // Filter op Prioriteit 1
        $filterPrioriteit1 = "SELECT * FROM `crud_agenda`";
        $filterPrioriteit1 .= " WHERE `Prioriteit` = 1";
                        
        if (isset($_POST['verzendFilter'])) {
                            
            // Voer de query uit en check of het 'resultaat' wordt opgevangen
            // [!] Het resultaat geeft aan of het wel of niet is gelukt ('true/false')
            $result = mysqli_query($mysqli, $filterPrioriteit1);
                        
        }

        // Filter op Niet Afgerond
        $filterNietAfgerond = "SELECT * FROM `crud_agenda`";
        $filterNietAfgerond .= " WHERE `Status` = 'n' OR `Status` = 'b'";
                                
        if (isset($_POST['verzendFilterNiet'])) {
                                    
            // Voer de query uit en check of het 'resultaat' wordt opgevangen
            // [!] Het resultaat geeft aan of het wel of niet is gelukt ('true/false')
            $result = mysqli_query($mysqli, $filterNietAfgerond);
                                
        }

        // Filter op Niet Afgerond
        $filterVerwijderen = "SELECT * FROM `crud_agenda`";
                                        
        if (isset($_POST['verwijderFilter'])) {
                                            
            // Voer de query uit en check of het 'resultaat' wordt opgevangen
            // [!] Het resultaat geeft aan of het wel of niet is gelukt ('true/false')
            $result = mysqli_query($mysqli, $filterVerwijderen);
                                        
        }

        // Maak een tabel
        echo "<table id='table' class='table' border='1px'>";

        // Eerst de headers van de tabel
        echo "<tr><th>Onderwerp</th><th>Inhoud</th><th>Begindatum</th><th>Einddatum</th><th>Detail</th><th>Verwijder</th><th>Aanpassen</th></tr>";

        // Items te lezen
        while ($item = mysqli_fetch_assoc($result)) {
            // Toon de gegevens
            echo "<tr>";
                echo "<td>" . $item['Onderwerp'] . "</td>";
                echo "<td>" . $item['Inhoud'] . "</td>";
                echo "<td>" . $item['Begindatum'] . "</td>";
                echo "<td>" . $item['Einddatum'] . "</td>";
                echo "<td>" . " <a id='detail' href='detail.php?id=" . $item['ID'] . "'>Details</a>" . "</td>";
                echo "<td>" . " <a id='verwijder' href='verwijder.php?id=" . $item['ID'] . "'>Verwijderen</a>" . "</td>";
                echo "<td>" . " <a id='pasaan' href='pasaan.php?id=" . $item['ID'] . "'>Aanpassen</a>" . "</td>";
            echo "</tr>";
        }
        // Sluit de tabel
        echo "</table>";

        ?>

        <a href='toevoegForm.php' class='btn'>ITEM TOEVOEGEN <i class='bx:bar-chart'></i></a>

        <?php

        if (isset($_SESSION['username'])) {
            
            echo "<a href='loguit.php' class='btnuitlog' >UITLOGGEN <i class='bx:bar-chart'></i></a><br>";
            echo "<p class='admin'><b>Je bent ingelogd als een admin.</b></p>";

        } else {
        
            echo "<a href='inlogForm.html' class='btn'>INLOGGEN <i class='bx:bar-chart'></i></a>";

        }

    // Als er geen records zijn
    } else {
        echo "<p>Geen items gevonden!</p>";
    }
?>

<script src="js/script.js"></script>

</body>

</html>

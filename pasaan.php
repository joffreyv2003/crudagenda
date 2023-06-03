<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gegevens aanpassen</title>
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
        ?>

    <div class="flex">
        <form action="aanpasVerwerk.php" class="form-class rightS" name="aanpasFormulier" method="post">
            <input type="hidden" name="idVeld" value="<?php echo $item['ID'];?>"/>
            <div class="btn-flex">
                <input type="text" name="onderwerpVeld" class="form-control" value="<?php echo $item['Onderwerp'];?>" placeholder="Onderwerp" required>
            </div>
            <div class="btn-flex">
                <input type="text" onfocus="(this.type='date')" name="begindatumVeld" class="form-control" value="<?php echo $item['Begindatum'];?>" placeholder="Begindatum" required>
                <input type="text" onfocus="(this.type='date')" name="einddatumVeld" class="form-control" value="<?php echo $item['Einddatum'];?>" placeholder="Einddatum" required>
            </div>
            <div class="btn-flex">
                <input type="number" min="1" max="4" name="prioriteitVeld" class="form-control" value="<?php echo $item['Prioriteit'];?>" placeholder="Prioriteit" required>
                <select class="form-control2" name="statusVeld" value="<?php echo $item['Status'];?>">
                    <option value="n">Nog Doen</option>
                    <option value="b">Bezig</option>
                    <option value="a">Afgemaakt</option>
                </select>
            </div>
            <div class="btn-flex">
                <textarea name="inhoudVeld" rows="10" class="form-control" placeholder="Inhoud" required><?php echo $item['Inhoud'];?></textarea>
            </div>
            <div class="btn-flex">
                <button type="submit" name="verzend" class="btn5" value="item aanpassen">Item Aanpassen</button>
            </div>
        </form>
    </div>

    <?php

    } else {
        echo "Er is geen record met ID: " . $id . "<br>";
    }

    echo "<a href='toonagenda.php' class='btn'>OVERZICHT <i class='bx:bar-chart'></i></a> <br/><br/>";
?>
</body>
</html>
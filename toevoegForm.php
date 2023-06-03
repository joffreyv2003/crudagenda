<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToevoegFormulier - PHP</title>
    <link rel="stylesheet" href="css/toevoegForm.css">
</head>
<body>
    <?php

    require 'config.php';

    // Lees het sessie bestand
    require_once 'session.inc.php';

    ?>

    <h1 class="title">ToevoegFormulier - PHP</h1>
    <div class="flex">
        <form action="toevoegVerwerk.php" class="form-class rightS" name="agendaFormulier" method="post">
            <div class="btn-flex">
                <input type="text" name="onderwerpVeld" class="form-control" placeholder="Onderwerp" required>
            </div>
            <div class="btn-flex">
                <input type="text" onfocus="(this.type='date')" name="begindatumVeld" class="form-control" placeholder="Begindatum" required>
                <input type="text" onfocus="(this.type='date')" name="einddatumVeld" class="form-control" placeholder="Einddatum" required>
            </div>
            <div class="btn-flex">
                <input type="number" min="1" max="4" name="prioriteitVeld" class="form-control" placeholder="Prioriteit" required>
                <select class="form-control2" name="statusVeld">
                    <option value="n">Nog Doen</option>
                    <option value="b">Bezig</option>
                    <option value="a">Afgemaakt</option>
                </select>
            </div>
            <div class="btn-flex">
                <textarea name="inhoudVeld" rows="10" class="form-control" placeholder="Inhoud" required></textarea>
            </div>
            <div class="btn-flex">
                <button type="submit" name="verzend" class="btn"><i class="bx bxs-paper-plane"></i> Toevoegen</button>
            </div>
        </form>
    </div>
</body>
</html>
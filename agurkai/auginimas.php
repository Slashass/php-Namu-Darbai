<?php
session_start();

if (!isset($_SESSION['a'])) {
    $_SESSION['obj'] = [];
    $_SESSION['agurku ID'] = 0;
}

include __DIR__ . '/Agurkas.php';

// $_SESSION['obj'] = Agurkas::nuimtiDerliu($_SESSION['obj']);

// AUGINIMO SCENARIJUS
if (isset($_POST['auginti'])) {

    // foreach($_SESSION['a'] as $index => &$agurkas) {
    //     $agurkas['agurkai'] 
    //     += $_POST['kiekis'][$agurkas['id']];
    // }

    // unset($agurkas);

    foreach ($_SESSION['obj'] as $index => $agurkas) { // <---- serializuotas stringas
        $agurkas = unserialize($agurkas); // <----- agurko objektas
        $agurkas->addAgurkas($_POST['kiekis'][$agurkas->id]); // <------- pridedam agurka
        $agurkas = serialize($agurkas); // <------ vel stringas
        $_SESSION['obj'][$index] = $agurkas; // <----- uzsaugom agurkus
    }



    // _d($_POST['kiekis']);
    header('Location: http://localhost/1stlesson/folder/agurkai/auginimas.php');
    exit;
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auginimas</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <h1>Agurku sodas </h1>
    <h2>Auginimas </h2>
    <a href="sodinimas.php">Sodinimas</a>
    <a href="auginimas.php">Auginimas</a>
    <a href="skynimas.php">Skynimas</a>
    <form action="" method="post">
        <?php foreach ($_SESSION['obj'] as $agurkas) : ?>
            <?php $agurkas = unserialize($agurkas) ?>

            <div>
                <img src="./img/cuc1.jpg" alt="Agurko nuotrauka">
                <!-- kiekis[] - nurodo agurku ID, value - kiek bus uzauginta augurku -->
                <?php $kiekis = rand(2, 9) ?>
                <h1 style="display: inline;"><?= $agurkas->count ?></h1>
                <h3 style="display: inline;color: red;">+<?= $kiekis ?></h3>
                <!-- kiekis[] - nurodo agurku ID, value - kiek bus uzauginta augurku -->
                <input type="hidden" name="kiekis[<?= $agurkas->id ?>]" value="<?= $kiekis ?>">
                Agurku: <?= $agurkas->id ?>

            </div>

        <?php endforeach ?>
        <!-- paspaudus ant Auginti mygtuko, i POST masyva irasomas 'auginti' elementas-->
        <button type="submit" name="auginti">AUGINTI</button>
    </form>
</body>

</html>
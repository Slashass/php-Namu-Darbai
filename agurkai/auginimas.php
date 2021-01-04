<?php
// saugo sesijoje
session_start();

// if (!isset($_SESSION['a'])) {
//     // $_SESSION['a'] = [];
//     // $_SESSION['agurku ID'] =  0;
// }

include __DIR__ . '/Agurkai.php';

$agurkas = new Agurkai;

$agurkas->agurguAuginimas();

// // auginimo scenarijus
// if (isset($_POST['auginti'])) {

//     foreach ($_SESSION['a'] as $index => &$agurkas) {
//         $agurkas['agurkai'] += $_POST['kiekis'][$agurkas['id']];
//     }
//     header('Location: http://localhost/1stlesson/folder/agurkai/auginimas.php');
//     exit;
// }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auginimas</title>
</head>
<style>
    img {
        height: 60px;
    }
</style>

<body>
    <h1>Agurku sodas </h1>
    <h2>Auginimas </h2>
    <a href="sodinimas.php">Sodinimas</a>
    <a href="auginimas.php">Auginimas</a>
    <a href="skynimas.php">Skynimas</a>
    <form action="" method="post">
        <?php foreach ($_SESSION['a'] as $agurkas) : ?>

            <div>
                <img src="./img/cuc-<?= $agurkas['img-path'] ?>.jpg" alt="Agurko nuotrauka">
                <!-- kiekis[] - nurodo agurku ID, value - kiek bus uzauginta augurku -->
                <?php $kiekis = rand(2, 9) ?>
                <h1 style="display: inline;"><?= $agurkas['agurkai'] ?></h1>
                <h3 style="display: inline;color: red;">+<?= $kiekis ?></h3>
                <!-- kiekis[] - nurodo agurku ID, value - kiek bus uzauginta augurku -->
                <input type="hidden" name="kiekis[<?= $agurkas['id'] ?>]" value="<?= $kiekis ?>">
                Agurku: <?= $agurkas['id'] ?>

            </div>

        <?php endforeach ?>
        <!-- paspaudus ant Auginti mygtuko, i POST masyva irasomas 'auginti' elementas-->
        <button type="submit" name="auginti">AUGINTI</button>
    </form>
</body>

</html>
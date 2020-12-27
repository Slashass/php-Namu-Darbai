<?php
// saugo sesijoje
session_start();

// pradinis masyvas ir ID nustatymas
if (!isset($_SESSION['a'])) {
    $_SESSION['a'] = [];
    $_SESSION['agurku ID'] =  0;
}
// skinti kazkoki kieki 
if (isset($_POST['skinti'])) {
    foreach ($_SESSION['a'] as $index => &$agurkas) {
        if ($_POST['skinti'] == $agurkas['agurkai']) {
            unset($_SESSION['a'][$agurkas['agurkai']]);
            header('Location: http://localhost/1stlesson/folder/agurkai/skynimas.php');
            exit;
        }
    }
}
// skinti visus
if (isset($_POST['skinti-visus'])) {
    foreach ($_SESSION['a'] as $index => &$agurkas) {
        if ($_POST['skinti-visus'] == $agurkas['id']) {
            unset($_SESSION['a'][$agurkas['agurkai']]);
            header('Location: http://localhost/1stlesson/folder/agurkai/sodinimas.php');
            exit;
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skynimas</title>
</head>

<body>
    <h1>Agurku sodas </h1>
    <h2>Skynimas </h2>
    <a href="sodinimas.php">Sodinimas</a>
    <a href="auginimas.php">Auginimas</a>
    <a href="skynimas.php">Skynimas</a>
    <form action="" method="post">
        <?php foreach ($_SESSION['a'] as $agurkas) : ?>

            <div>
                Agurkas nr. <?= $agurkas['id'] ?>
                Galima skinti: <?= $agurkas['agurkai'] ?>
                <input type="text" name="<?= $agurkas['agurkai'] ?>" placeholder="kiekis">
                <button type="submit" name="skinti">SKINTI</button>
                <button type="submit" name="skinti-visus">SKINTI VISUS</button>

            </div>

        <?php endforeach ?>
        <button type="submit" name="nuskinti-viska">Nuskinti visus agurkus</button>
    </form>
</body>

</html>
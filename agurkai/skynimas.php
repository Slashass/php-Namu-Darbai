<?php
// saugo sesijoje
session_start();

// pradinis masyvas ir ID nustatymas
if (!isset($_SESSION['a'])) {
    $_SESSION['obj'] = [];
    $_SESSION['agurku ID'] =  0;
}

include __DIR__ . '/Agurkas.php';


// skinti kazkoki kieki irasius
if (isset($_POST['skinti'])) {
    foreach ($_SESSION['obj'] as $index => &$agurkas) {
        if ($_POST['kiek'][$agurkas->id] <= $agurkas->count) {
            $agurkas->count -= $_POST['kiek'][$agurkas->id];
        }
    }
    header('Location: http://localhost/1stlesson/folder/agurkai/skynimas.php');
    exit;
}
// skinti visus 
if (isset($_POST['skinti-visus'])) {
    foreach ($_SESSION['obj'] as &$agurkas) {
        if ($_POST['skinti-visus'] == $agurkas->id) {
            $agurkas->count = 0;
        }
    }
    header('Location: http://localhost/1stlesson/folder/agurkai/skynimas.php');
    exit;
}

// nuimti visa derliu
if (isset($_POST['nuskinti-viska'])) {
    foreach ($_SESSION['obj'] as &$agurkas) {
        if ($_POST['kiek'][$agurkas->id] <= $agurkas->count) {
            $agurkas->count = 0;
        }
    }
    header('Location: http://localhost/1stlesson/folder/agurkai/skynimas.php');
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skynimas</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <h1>Agurku sodas </h1>
    <h2>Skynimas </h2>
    <a href="sodinimas.php">Sodinimas</a>
    <a href="auginimas.php">Auginimas</a>
    <a href="skynimas.php">Skynimas</a>
    <form action="" method="post">
        <?php foreach ($_SESSION['obj'] as $agurkas) : ?>
            <?php $agurkas = unserialize($agurkas) ?>
            <div>
                <img src="./img/cuc1.jpg" alt="Agurko nuotrauka">
                Agurkas nr. <?= $agurkas->id ?>
                Galima skinti: <?= $agurkas->count ?>
                <input type="text" name="kiek[<?= $agurkas->id ?>]" value=<?= $skynimas ?? 0 ?>>
                <button type="submit" name="skinti">SKINTI</button>
                <button type="submit" name="skinti-visus" value="<?= $agurkas->id ?>">SKINTI VISUS</button>

            </div>

        <?php endforeach ?>
        <button type="submit" name="nuskinti-viska">Nuskinti visus agurkus</button>
    </form>
</body>

</html>
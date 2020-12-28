<?php
// saugo sesijoje
session_start();

// pradinis masyvas ir ID nustatymas
if (!isset($_SESSION['a'])) {
    $_SESSION['a'] = [];
    $_SESSION['agurku ID'] =  0;
}
// skinti kazkoki kieki irasius
if (isset($_POST['skinti'])) {
    foreach ($_SESSION['a'] as $index => &$agurkas) {
        if ($_POST['kiek'][$agurkas['id']] <= $agurkas['agurkai']) {
            $agurkas['agurkai'] -= $_POST['kiek'][$agurkas['id']];
        }
    }
    header('Location: http://localhost/1stlesson/folder/agurkai/skynimas.php');
    exit;
}
// skinti visus 
if (isset($_POST['skinti-visus'])) {
    foreach ($_SESSION['a'] as &$agurkas) {
        if ($_POST['skinti-visus'] == $agurkas['id']) {
            $agurkas['agurkai'] = 0;
        }
    }
    header('Location: http://localhost/1stlesson/folder/agurkai/skynimas.php');
    exit;
}
// nuimti visa derliu
if (isset($_POST['nuskinti-viska'])) {
    foreach ($_SESSION['a'] as &$agurkas) {
        if ($_POST['kiek'][$agurkas['id']] <= $agurkas['agurkai']) {
            $agurkas['agurkai'] = 0;
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
</head>
<style>
    img {
        height: 60px;
    }
</style>

<body>
    <h1>Agurku sodas </h1>
    <h2>Skynimas </h2>
    <a href="sodinimas.php">Sodinimas</a>
    <a href="auginimas.php">Auginimas</a>
    <a href="skynimas.php">Skynimas</a>
    <form action="" method="post">
        <?php foreach ($_SESSION['a'] as $agurkas) : ?>

            <div>
                <img src="./img/cuc-<?= $agurkas['img-path'] ?>.jpg" alt="Agurko nuotrauka">
                Agurkas nr. <?= $agurkas['id'] ?>
                Galima skinti: <?= $agurkas['agurkai'] ?>
                <input type="text" name="kiek[<?= $agurkas['id'] ?>]" value=<?= $skynimas ?? 0 ?>>
                <button type="submit" name="skinti">SKINTI</button>
                <button type="submit" name="skinti-visus" value="<?= $agurkas['id'] ?>">SKINTI VISUS</button>

            </div>

        <?php endforeach ?>
        <button type="submit" name="nuskinti-viska">Nuskinti visus agurkus</button>
    </form>
</body>

</html>
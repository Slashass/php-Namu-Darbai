<?php
// saugo sesijoje
session_start();

if (!isset($_SESSION['a'])) {
    $_SESSION['a'] = [];
    $_SESSION['agurku ID'] =  0;
}

// sodinimo scenarijus kas vyksta  sodinimo metu
if (isset($_POST['sodinti'])) {

    $kiekis = (int) $_POST['kiekis'];

    if (0 > $kiekis || 4 < $kiekis) { // <--- validacija
        if (0 > $kiekis) {
            $_SESSION['err'] = 1; // <-- neigiamas agurku kiekis
        } elseif (4 < $kiekis) {
            $_SESSION['err'] = 2; // <-- per daug
        }

        header('Location: http://localhost/bla/agurkai/sodinimas.php');
        exit;
    }

    foreach (range(1, $kiekis) as $_) {
        $_SESSION['a'][] = [
            'id' => ++$_SESSION['agurku ID'],
            'agurkai' => 0
        ];
    }


    header('Location: http://localhost/bla/agurkai/sodinimas.php');
    exit;
}
// isrovimo scenarijus 
if (isset($_POST['israuti'])) {
    foreach ($_SESSION['a'] as $index => &$agurkas) {
        if ($_POST['israuti'] == $agurkas['id']) {
            unset($_SESSION['a'][$index]);
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
    <title>Sodinimas</title>
</head>
<style>
    img {
        height: 60px;
    }
</style>

<body>
    <h1>Agurku sodas </h1>
    <h2>Sodinimas </h2>
    <a href="sodinimas.php">Sodinimas</a>
    <a href="auginimas.php">Auginimas</a>
    <a href="skynimas.php">Skynimas</a>
    <?php include __DIR__ . '/error.php' ?>
    <form action="" method="post">
        <?php foreach ($_SESSION['a'] as $agurkas) : ?>

            <div>
                <img src="./img/cuc1.jpg" alt="Agurko nuotrauka">
                Agurkas nr. <?= $agurkas['id'] ?>
                Agurku: <?= $agurkas['agurkai'] ?>
                <button type="submit" name="israuti" value="<?= $agurkas['id'] ?>">ISRAUTI</button>
            </div>

        <?php endforeach ?>
        <button type="submit" name="sodinti">SODINTI</button>
    </form>
</body>

</html>
<?php
// saugo sesijoje
session_start();

if (!isset($_SESSION['a'])) {
    $_SESSION['a'] = [];
    $_SESSION['agurku ID'] =  0;
}

// sodinimo scenarijus kas vyksta  sodinimo metu
if (isset($_POST['sodinti'])) {

    $_SESSION['a'][] = [
        'id' => ++$_SESSION['agurku ID'],
        'agurkai' => 0
    ];
    header('Location: http://localhost/1stlesson/folder/agurkai/sodinimas.php');
    exit;
}
// isrovimo scenarijus 
if (isset($_POST['israuti'])) {
    foreach ($_SESSION['a'] as $index => $agurkas) {
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

<body>
    <h1>Agurku sodas </h1>
    <h2>Sodinimas </h2>
    <form action="" method="post">
        <?php foreach ($_SESSION['a'] as $agurkas) : ?>

            <div>
                Agurkas nr. <?= $agurkas['id'] ?>
                Agurku: <?= $agurkas['agurkai'] ?>
                <button type="submit" name="israuti" value="<?= $agurkas['id'] ?>">ISRAUTI</button>
            </div>

        <?php endforeach ?>
        <button type="submit" name="sodinti">SODINTI</button>
    </form>
</body>

</html>
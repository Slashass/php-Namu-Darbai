<?php
session_start();
include __DIR__ . '/App.php';
include __DIR__ . '/Darzove.php';
include __DIR__ . '/Agurkas.php';
include __DIR__ . '/Paprika.php';

App::setSession();

if (isset($_POST['auginti'])) {
    App::grow();
    App::redirect('auginimas');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auginimas</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/reset.css">
</head>

<body>
    <h1>Agurku sodas </h1>
    <h2>Auginimas </h2>
    <a href="sodinimas.php">Sodinimas</a>
    <a href="auginimas.php">Auginimas</a>
    <a href="skynimas.php">Skynimas</a>
    <form action="" method="post">
        <?php foreach ($_SESSION['darzoves'] as $darzove) : ?>
            <?php $darzove = unserialize($darzove) ?>
            <?php if ($darzove instanceof Agurkas) : ?>
                <div class="items">
                    <img src="img/cuc-<?= $darzove->imgPath ?>.jpg" alt="Agurko nuotrauka">
                    <h2 style="display: inline;">Agurkas Nr. :<?= $darzove->id ?></h2>
                    <p class="kiek-augs"> +<?= $kiekis = $darzove->kiekAugti() ?></p>
                    <input type="hidden" name="kiekis[<?= $darzove->id ?>]" value="<?= $kiekis ?>">
                    <p>Agurku: <?= $darzove->count ?></p>
                </div>
            <?php else : ?>
                <div class="items">
                    <img src="img/paprika-<?= $darzove->imgPath ?>.jpg" alt="Agurko nuotrauka">
                    <h2 style="display: inline;">Paprika Nr. :<?= $darzove->id ?></h2>
                    <p class="kiek-augs"> +<?= $kiekis = $darzove->kiekAugti() ?></p>
                    <input type="hidden" name="kiekis[<?= $darzove->id ?>]" value="<?= $kiekis ?>">
                    <p> Papriku: <?= $darzove->count ?></p>
                </div>
            <?php endif ?>
        <?php endforeach ?>
        <!-- paspaudus ant Auginti mygtuko, i POST masyva irasomas 'auginti' elementas-->
        <button class="auginti" type="submit" name="auginti">AUGINTI</button>
    </form>
</body>

</html>
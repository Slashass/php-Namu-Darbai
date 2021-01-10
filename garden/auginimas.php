<?php
session_start();

include __DIR__ . '/vendor/autoload.php';

use Main\App;
use Cucumber\Agurkas;
use Pepper\Paprika;

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
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<header>
    <a href="sodinimas.php">Sodinimas</a>
    <a href="auginimas.php">Auginimas</a>
    <a href="skynimas.php">Skynimas</a>
</header>

<body>
    <h1>Agurku sodas </h1>
    <h2>Auginimas </h2>
    <?php include __DIR__ . '/err/error.php' ?>
    <form action="" method="post">
        <?php foreach ($_SESSION['darzoves'] as $darzove) : ?>
            <?php $darzove = unserialize($darzove) ?>
            <?php if ($darzove instanceof Agurkas) : ?>
                <div class="items auginimas">
                    <img src="img/cuc-<?= $darzove->imgPath ?>.jpg" alt="Agurko nuotrauka">
                    <h2>Agurkas Nr. :<?= $darzove->id ?></h2>
                    <h3>Agurku: <?= $darzove->count ?></h3>
                    <p> +<?= $kiekis = $darzove->kiekAugti() ?></p>
                    <input type="hidden" name="kiekis[<?= $darzove->id ?>]" value="<?= $kiekis ?>">
                </div>
            <?php else : ?>
                <div class="items auginimas">
                    <img src="img/paprika-<?= $darzove->imgPath ?>.jpg" alt="Agurko nuotrauka">
                    <h2>Paprikos Nr. :<?= $darzove->id ?></h2>
                    <h3> Papriku: <?= $darzove->count ?></h3>
                    <p> +<?= $kiekis = $darzove->kiekAugti() ?></p>
                    <input type="hidden" name="kiekis[<?= $darzove->id ?>]" value="<?= $kiekis ?>">
                </div>
            <?php endif ?>
        <?php endforeach ?>
        <!-- paspaudus ant Auginti mygtuko, i POST masyva irasomas 'auginti' elementas-->
        <button class="auginti" type="submit" name="auginti">AUGINTI</button>
    </form>
</body>

</html>
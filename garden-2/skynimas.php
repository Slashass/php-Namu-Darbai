<?php
defined('DOOR_BELL') || exit('Nurodytas blogas URL');

use Main\Storage;
use Main\App;
use Cucumber\Agurkas;
use Peper\Paprika;

$storage = new Storage('darzoves');

if (isset($_POST['skinti'])) {
    $storage->skinti();
    App::redirect('skynimas');
}

if (isset($_POST['skinti-visus'])) {
    $storage->skintiVisusVienoAgurko();
    App::redirect('skynimas');
}

if (isset($_POST['nuskinti-viska'])) {
    $storage->nuskintiVisus();
    App::redirect('skynimas');
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skynimas</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<header>
    <a href="sodinimas">Sodinimas</a>
    <a href="auginimas">Auginimas</a>
    <a href="skynimas">Skynimas</a>
</header>

<body>
    <h1>Darzoviu sodas </h1>
    <h2>Skynimas </h2>
    <?php include __DIR__ . '/err/error.php' ?>

    <?php foreach ($storage->getAll() as $darzove) : ?>
        <form action="<?= URL . 'skynimas' ?>" method="post">
            <?php if ($darzove instanceof Agurkas) : ?>
                <div class="items skynimas">
                    <img src="./img/cuc-<?= $darzove->imgPath ?>.jpg" alt="Agurko nuotrauka">
                    <?php if ($darzove->count == 0) : ?>
                        <h2 style="display: inline;">Agurkas Nr. :<?= $darzove->id ?></h2>
                        <p>Kiekis: <span><?= $darzove->count ?></span></p>
                        <p>Nėra ko skinti.</p>
                    <?php else : ?>
                        <h2>Agurkas Nr. :<?= $darzove->id ?></h2>
                        <p class="galimaSkinti">Galima skinti: <?= $darzove->count ?></p>
                        <input class="kiek" type="number" name="kiek">
                        <button class="skinti" type="submit" name="skinti" value="<?= $darzove->id ?>">Skinti</button>
                        <button class="skinti-visus" type="submit" name="skinti-visus" value="<?= $darzove->id ?>">Skinti visus</button>
                    <?php endif ?>
                </div>
            <?php else : ?>
                <div class="items skynimas">
                    <img src="./img/paprika-<?= $darzove->imgPath ?>.jpg" alt="Paprikos nuotrauka">
                    <?php if ($darzove->count == 0) : ?>
                        <h2 style="display: inline;">Paprikos Nr. :<?= $darzove->id ?></h2>
                        <p>Kiekis: <span><?= $darzove->count ?></span></p>
                        <p>Nėra ko skinti.</p>
                    <?php else : ?>
                        <h2>Paprikos Nr. :<?= $darzove->id ?></h2>
                        <p class="galimaSkinti">Galima skinti: <?= $darzove->count ?></p>
                        <input class="kiek" type="number" name="kiek">
                        <button class="skinti" type="submit" name="skinti" value="<?= $darzove->id ?>">Skinti</button>
                        <button class="skinti-visus" type="submit" name="skinti-visus" value="<?= $darzove->id ?>">Skinti visus</button>
                    <?php endif ?>
                </div>
            <?php endif ?>
        </form>
    <?php endforeach ?>
    <form class="nuskinti-viska" action="" method="post">
        <button class="nuskinti-viska" type="submit" name="nuskinti-viska">Nuskinti visus agurkus</button>

</body>

</html>
<?php
defined('DOOR_BELL') || exit('Nurodytas blogas URL');

use Main\Storage;
use Main\App;
use Cucumber\Agurkas;
use Peper\Paprika;

// _d($_SESSION, 'SESIJA');
// _dc($_SESSION);


$storage = new Storage('darzoves');

if (isset($_POST['sodinti-agurka'])) {
    $agurkasObj = new Agurkas($storage->getNewId());
    $storage->addNewAgurkas($agurkasObj);
    App::redirect('sodinimas');
}

if (isset($_POST['sodinti-paprika'])) {
    $paprikaObj = new Paprika($storage->getNewId());
    $storage->addNewPaprika($paprikaObj);
    App::redirect('sodinimas');
}

if (isset($_POST['israuti'])) {
    $storage->remove($_POST['israuti']);
    App::redirect('sodinimas');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sodinimas</title>
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
    <h2>Sodinimas </h2>
    <?php include __DIR__ . '/err/error.php' ?>
    <form action="<?= URL . 'sodinimas' ?>" method="post">
        <?php foreach ($storage->getAll() as $darzove) : ?>
            <?php if ($darzove instanceof Agurkas) : ?>
                <div class="items sodinimas">
                    <img src="img/cuc-<?= $darzove->imgPath ?>.jpg" alt="Agurko nuotrauka">
                    <h2>Agurkas Nr. :<?= $darzove->id ?></h2>
                    <h3>Agurku: <?= $darzove->count ?></h3>
                    <button class="isrovimoMyg" type="submit" name="israuti" value="<?= $darzove->id ?>">ISRAUTI</button>
                </div>
            <?php else : ?>
                <div class="items sodinimas">
                    <img src="img/paprika-<?= $darzove->imgPath ?>.jpg" alt="Paprikos nuotrauka">
                    <h2>Paprikos Nr. :<?= $darzove->id ?></h2>
                    <h3>Papriku: <?= $darzove->count ?></h3>
                    <button class="isrovimoMyg" type="submit" name="israuti" value="<?= $darzove->id ?>">ISRAUTI</button>
                </div>
            <?php endif ?>
        <?php endforeach ?>
        <button class="sodintiAgurka" type="submit" name="sodinti-agurka">Sodinti agurką</button>
        <button class="sodintiPaprika" type="submit" name="sodinti-paprika">Sodinti paprika</button>
    </form>
</body>

</html>
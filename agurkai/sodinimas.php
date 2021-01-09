<?php
session_start();
include __DIR__ . '/App.php';
include __DIR__ . '/Darzove.php';
include __DIR__ . '/Agurkas.php';
include __DIR__ . '/Paprika.php';

// _d($_SESSION, 'SESIJA');
// _dc($_SESSION);

App::setSession();

if (isset($_POST['sodinti-agurka'])) {
    App::plantAgurkas();
    App::redirect('sodinimas');
}

if (isset($_POST['sodinti-paprika'])) {
    App::plantPaprika();
    App::redirect('sodinimas');
}

if (isset($_POST['israuti'])) {
    App::remove();
    App::redirect('sodinimas');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sodinimas</title>
    <link rel="stylesheet" href="css/main.css">
</head>


<body>
    <h1>Agurku sodas </h1>
    <h2>Sodinimas </h2>
    <a href="sodinimas.php">Sodinimas</a>
    <a href="auginimas.php">Auginimas</a>
    <a href="skynimas.php">Skynimas</a>
    <?php include __DIR__ . '/error.php' ?>
    <form action="" method="post">
        <?php foreach ($_SESSION['darzoves'] as $darzove) : ?>
            <?php $darzove = unserialize($darzove) ?>
            <?php if ($darzove instanceof Agurkas) : ?>
                <div class="items">
                    <img src="img/cuc-<?= $darzove->imgPath ?>.jpg" alt="Agurko nuotrauka">
                    <h2>Agurkas nr. :<?= $darzove->id ?></h2>
                    <p>Agurku: <?= $darzove->count ?></p>
                    <button class="isrovimoMyg" type="submit" name="israuti" value="<?= $darzove->id ?>">ISRAUTI</button>
                </div>
            <?php else : ?>
                <div class="items">
                    <img src="img/paprika-<?= $darzove->imgPath ?>.jpg" alt="Paprikos nuotrauka">
                    <h2>Paprikos nr. :<?= $darzove->id ?></h2>
                    <p>Papriku: <?= $darzove->count ?></p>
                    <button class="isrovimoMyg" type="submit" name="israuti" value="<?= $darzove->id ?>">ISRAUTI</button>
                </div>
            <?php endif ?>
        <?php endforeach ?>
        <button class="sodinti agurka" type="submit" name="sodinti-agurka">Sodinti agurką</button>
        <button class="sodinti paprika" type="submit" name="sodinti-paprika">Sodinti paprika</button>
    </form>
</body>

</html>
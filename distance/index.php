<?php
session_start();

if (!empty($_POST)) {
    $town1 = $_POST['m1'];
    $town2 = $_POST['m2'];

    // CATCHE START
    include __DIR__ . '/Catche.php';
    $DATA = new Catche;

    $answer = $DATA->get();

    $_SESSION['method'] = false === $answer ? 'API' : 'CATCHE';


    if (false === $answer) {
        // API START

        $ch = curl_init();

        curl_setopt(
        $ch, CURLOPT_URL, 
        'https://www.distance24.org/route.json?stops='.$town1.'|'.$town2
        );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $answer = curl_exec($ch); // siuntimas ir laukimas atsakymo

        $answer = json_decode($answer);

        $DATA->set($answer); // <---- uzkesinam naujus duomenis

        // API END
        
    }
    $_SESSION['distance'] = $answer->distance;
    $_SESSION['t1'] = $town1;
    $_SESSION['t2'] = $town2;
    $_SESSION['img1'] = $answer->stops[0]->wikipedia->image;
    $_SESSION['img2'] = $answer->stops[1]->wikipedia->image;

    header('Location: http://localhost/1stlesson/folder/distance/');
    die;
    
}

if (isset($_SESSION['distance'])) {
    $dist = $_SESSION['distance'];
    $town1 = $_SESSION['t1'];
    $town2 = $_SESSION['t2'];
    $img1 = $_SESSION['img1'];
    $img2 = $_SESSION['img2'];
    $method = $_SESSION['method'];
    unset($_SESSION['distance'], $_SESSION['t1'], $_SESSION['t2'], $_SESSION['img1'], $_SESSION['img2'], $_SESSION['method']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API</title>
</head>
<body>
<h1> Atstumų API </h1>
    <form action="" method="post">
    
    <input type="text" name="m1" value="<?= $town1 ?? '' ?>">
    <input type="text" name="m2" value="<?= $town2 ?? '' ?>">

    <button type="submit">GAUTI ATSTUMĄ</button>
    
    </form>

    <?php if(isset($dist)): ?>
    <h2> Būdas: <?= $method ?> </h2>
    <h2> Atstumas yra: <?= $dist ?> KM </h2>
    <img style="width: 100px;" src="<?= $img1 ?? '' ?>">
    <img style="width: 100px;" src="<?= $img2 ?? '' ?>">
    <?php endif ?>

</body>
</html>
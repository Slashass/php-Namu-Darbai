<?php
defined('DOOR_BELL') || exit('Nurodytas blogas URL');

use Main\Storage;
use Main\App;
use Cucumber\Agurkas;
use Peper\Paprika;

// _d($_SESSION, 'SESIJA');
// _dc($_SESSION);


$storage = new Storage('darzoves');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rawData = file_get_contents("php://input");
    $rawData = json_decode($rawData, 1);
    // _d($rawData);


    if (isset($rawData['list'])) {
        ob_start();
        include __DIR__ . '/list-cuc.php';
        include __DIR__ . '/list-pap.php';
        $output = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $output];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(200);
        echo $json;
        die;
    } elseif (isset($rawData['sodintiAgurka'])) {
        $kiekis = $rawData['kiekis'];
        // _d($kiekis);

        if ($kiekis < 0 || 4 < $kiekis) {
            if (0 > $kiekis) $error = 1;
            elseif (4 < $kiekis) $error = 2;
            ob_start();
            include __DIR__ . '/err/error.php';
            $output = ob_get_contents();
            ob_end_clean();
            $json = ['msg' => $output];
            $json = json_encode($json);
            header('Content-type: application/json');
            http_response_code(400);
            echo $json;
            exit;
        }

        foreach (range(1, $kiekis) as $_) {
            $agurkasObj = new Agurkas($storage->getNewId());
            $storage->addNewAgurkas($agurkasObj);
            // App::redirect('sodinimas');
        }
        ob_start();
        include __DIR__ . '/list-cuc.php';
        $output = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $output];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(201);
        echo $json;
        exit;
    } elseif (isset($rawData['sodintiPaprika'])) {
        $kiekis = $rawData['kiekis'];

        if (0 > $kiekis || 4 < $kiekis) {
            if (0 > $kiekis) $error = 1;
            elseif (4 < $kiekis) $error = 2;
            ob_start();
            include __DIR__ . '/err/error.php.php';
            $output = ob_get_contents();
            ob_end_clean();
            $json = ['msg' => $output];
            $json = json_encode($json);
            header('Content-type: application/json');
            http_response_code(400);
            echo $json;
            die;
        }

        foreach (range(1, $kiekis) as $_) {
            $paprikaObj = new Paprika($storage->getNewId());
            $storage->addNewPaprika($paprikaObj);
        }
        ob_start();
        include __DIR__ . '/list-pap.php';
        $output = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $output];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(201);
        echo $json;
        die;
    } elseif (isset($rawData['israuti'])) {
        $storage->remove($rawData['id']);

        ob_start();
        include __DIR__ . '/list-cuc.php';
        include __DIR__ . '/list-pap.php';
        $output = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $output];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(200);
        echo $json;
        die;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" defer integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
    <script src="http://localhost/1stlesson/folder/garden-2/app.js" defer></script>
    <script>
        const apiUrl = 'http://localhost/1stlesson/folder/garden-2/sodinimas';
    </script>
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
    <div id="error"></div>
    <div id="grazinaA"></div>
    <div id="grazinaP"></div>
    <form>
        <div id="list"></div>

        <input class="agurkas" type="text" name="sodinti-agurka" id="cucumber">
        <button class="sodintiAgurka" type="button">Sodinti agurką</button>
        <input class="paprika" type="text" name="sodinti-paprika" id="peper">
        <button class="sodintiPaprika" type="button">Sodinti paprika</button>
    </form>
</body>

</html>
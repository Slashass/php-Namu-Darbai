<?php
defined('DOOR_BELL') || exit('Nurodytas blogas URL');

use Main\Storage;

$storage = new Storage('darzoves');

if ('POST' == $_SERVER['REQUEST_METHOD']) {
    $rawData = file_get_contents("php://input");
    $rawData = json_decode($rawData, 1);

    // Listo setinimas --------------------------------------
    if (isset($rawData['list'])) {
        ob_start();
        include __DIR__ . '/list-augimas.php';
        $output = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $output];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(200);
        echo $json;
        die;
        // Auginimo scenarijus ---------------------------------
    } elseif (isset($rawData['auginti'])) {
        $storage->grow();

        ob_start();
        include __DIR__ . '/list-augimas.php';
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
    <title>Auginimas</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" defer integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
    <script src="http://localhost/1stlesson/folder/garden-2/js/auginimas.js" defer></script>
    <script>
        const apiUrl = 'http://localhost/1stlesson/folder/garden-2/auginimas';
    </script>
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
    <h2>Auginimas </h2>
    <div id="error"></div>
    <form>
        <div id="list"></div>

        <button class="auginti" type="button" name="auginti" id="auginti">AUGINTI</button>
    </form>
</body>

</html>
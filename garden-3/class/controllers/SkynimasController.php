<?php

namespace Main\Controllers;

use Main\Storage;
use Main\App;
use Main\Catche;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class SkynimasController
{

    private $storage, $rawData, $DATA;

    public function __construct()
    {
        if ('POST' == $_SERVER['REQUEST_METHOD']) {
            $this->storage = new Storage('darzoves');
            $this->DATA = new Catche;
            $this->rate = App::getRate($this->DATA);
            $this->rawData = App::$request->getContent(); // Symfony
            $this->rawData = json_decode($this->rawData, 1);
        }
    }
    // Skynimo puslapio rodymo scenarijus -------------------
    public function index()
    {
        // atsakymas narsyklei ------------------------------
        $response = new Response(
            'Content',
            200,
            ['content-type' => 'text/html']
        );
        ob_start();
        include DIR . '/views/skynimas/index.php';
        $output = ob_get_contents();
        ob_end_clean();
        $response->setContent($output);
        $response->prepare(App::$request);
        return $response;
    }

    // Listo setinimas ---------------------------------------
    public function list()
    {
        $storage = new Storage('darzoves');
        ob_start();
        include DIR . '/views/skynimas/list-skynimas.php';
        $output = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $output];
        $response = new JsonResponse($json);
        $response->prepare(App::$request);
        return $response;
    }
    // Skinti nurodyta kieki -------------------------------
    public function skinti()
    {

        $kiekis = (int) $this->rawData['kiek-skinti'];
        $this->storage->skinti($this->rawData['id'], $kiekis);

        if ($kiekis <= 0) {
            if (0 == $kiekis) $error = 4;
            elseif (0 > $kiekis) $error = 1;
            ob_start();
            include DIR . '/views/sodinimas/error.php';
            $output = ob_get_contents();
            ob_end_clean();
            $json = ['msg' => $output];
            $json = json_encode($json);
            header('Content-type: application/json');
            http_response_code(400);
            echo $json;
            die;
        }

        $storage = $this->storage;
        ob_start();
        include DIR . '/views/skynimas/list-skynimas.php';
        $output = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $output];
        $response = new JsonResponse($json);
        $response->prepare(App::$request);
        return $response;
    }
    // Skinti visus vienos darzoves ------------------------
    public function skintiVisus()
    {
        $this->storage->skintiVisusVienoAgurko($this->rawData['id']);

        $storage = $this->storage;
        ob_start();
        include DIR . '/views/skynimas/list-skynimas.php';
        $output = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $output];
        $respone = new JsonResponse($json);
        $respone->prepare(App::$request);
        return $respone;
    }
    // Nuskinti visas darzoves -----------------------------
    public function nuskintiVisus()
    {

        $this->storage->nuskintiVisus();
        $storage = $this->storage;
        ob_start();
        include DIR . '/views/skynimas/list-skynimas.php';
        $output = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $output];
        $respone = new JsonResponse($json);
        $respone->prepare(App::$request);
        return $respone;
    }
}

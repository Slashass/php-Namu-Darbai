<?php
// defined('DOOR_BELL') || exit('Nurodytas blogas URL');

namespace Main\Controllers;

use Main\Storage;
use Main\App;
use Main\Catche;
use Cucumber\Agurkas;
use Peper\Paprika;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class SodinimasController
{

    private $store, $rawData, $DATA, $rate;

    public function __construct()
    {

        if ('POST' === $_SERVER['REQUEST_METHOD']) {
            $this->storage = new Storage('darzoves');
            $this->rawData = App::$request->getContent(); // SYMFONY
            $this->rawData = json_decode($this->rawData, 1);
            $this->DATA = new Catche;
            $this->rate = App::getRate($this->DATA);
        }
    }

    // sodinimo puslapio rodymo scenarijus ------------------
    public function index()
    {
        // atsakymas narsyklei ------------------------------
        $response = new Response(
            'Content',
            200,
            ['content-type' => 'text/html']
        );

        ob_start();
        include DIR . '/views/index.php';
        $output = ob_get_contents();
        ob_end_clean();

        // setinam contenta ---------------------------------
        $response->setContent($output);
        // paruosiam ----------------------------------------
        $response->prepare(App::$request);

        // grazinam response tam kas ji iskviete ------------
        return $response;
    }


    // Listo setinimas --------------------------------------
    public function list()
    {

        // kreipiames i views ir perduodam kintamuosius -----
        $storage = new Storage('darzoves');
        ob_start();
        include DIR . '/views/list-sodinimas.php';
        $output = ob_get_contents();
        ob_end_clean();

        $json = ['list' => $output];

        // atsakymas narsyklei ------------------------------
        $response = new JsonResponse($json);

        $response->prepare(App::$request);

        return $response;

        // $json = json_encode($json);
        // header('Content-type: application/json');
        // http_response_code(200);
        // echo $json;
        // exit;
    }


    // Agurko sodinimas ------------------------------------
    public function sodintiAgurka()
    {

        $kiekis = $this->rawData['kiekis'];
        $kiekis = $kiekis ? $kiekis : 1;

        if ($kiekis < 0 || 4 < $kiekis) { // <--- validacija
            if (0 > $kiekis) $error = 1;
            elseif (4 < $kiekis) $error = 2;
            ob_start();
            include DIR . '/err/error.php';
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
            $agurkasObj = new Agurkas($this->storage->getNewId());
            $this->storage->addNewAgurkas($agurkasObj);
            // App::redirect('sodinimas');
        }
        ob_start();
        $storage =  $this->storage;
        include DIR . '/views/list-sodinimas.php';
        $output = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $output];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(201);
        echo $json;
        exit;
    }

    // Paprikos sodinimas ----------------------------------
    public function sodintiPaprika()
    {

        $kiekis = $this->rawData['kiekis'];
        $kiekis = $kiekis ? $kiekis : 1;

        if (0 > $kiekis || 4 < $kiekis) { // <--- validacija
            if (0 > $kiekis) $error = 1;
            elseif (4 < $kiekis) $error = 2;
            ob_start();
            include DIR . '/err/error.php';
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
            $paprikaObj = new Paprika($this->storage->getNewId());
            $this->storage->addNewPaprika($paprikaObj);
        }
        ob_start();
        $storage = $this->storage;
        include DIR . '/views/list-sodinimas.php';
        $output = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $output];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(201);
        echo $json;
        exit;
    }

    // Isrovimo scenarijus ---------------------------------
    public function remove()
    {

        $this->storage->remove($this->rawData['id']);

        ob_start();
        $storage = $this->storage;
        include DIR . '/views/list-sodinimas.php';
        $output = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $output];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(200);
        echo $json;
        exit;
    }
}

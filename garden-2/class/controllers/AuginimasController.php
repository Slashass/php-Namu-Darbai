<?php

namespace Main\Controllers;

use Main\Storage;
use Main\App;
use Main\Catche;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class AuginimasController
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
        include DIR . '/views/auginimas/index.php';
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
        $storage = new Storage('darzoves');
        // $rate = $this->rate;
        ob_start();
        include DIR . '/views/auginimas/list-augimas.php';
        $output = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $output];
        $response = new JsonResponse($json);
        $response->prepare(App::$request);
        return $response;
    }

    // Auginimo scenarijus ---------------------------------
    public function grow()
    {
        $this->storage->grow();
        $storage = $this->storage;
        ob_start();
        include DIR . '/views/auginimas/list-augimas.php';
        $output = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $output];
        $response = new JsonResponse($json);
        $response->prepare(App::$request);
        return $response;
    }
}

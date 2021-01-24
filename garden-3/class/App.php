<?php

namespace Main;

use Main\Controllers\AuginimasController;
use Main\Controllers\SkynimasController;
use Main\Controllers\SodinimasController;
use Symfony\Component\HttpFoundation\Request;


class App
{
    public static $request;

    private static $storeSetting = 'db'; // json OR db

    public static function start()
    {
        self::$request = Request::createFromGlobals();

        return self::router();
    }

    // OBJ Factory ------------------------------------------------------
    // gamina arba json obj arba db obj ---------------------------------
    public static function store($type)
    {
        if ('json' == self::$storeSetting) {
            return new JsonStorage($type);
        }
        if ('db' == self::$storeSetting) {
            return new DbStorage($type);
        }
    }

    // Router -----------------------------------------------------------
    public static function router()
    {

        // pasalinam folderi is duomenu ---------------------------------
        $uri = str_replace(INSTALL_FOLDER, '', $_SERVER['REQUEST_URI']);

        // duomenis pasiverciam i masyva is uri eilutes -----------------
        $uri = explode('/', $uri);

        // Router -------------------------------------------------------
        if ('sodinimas' == $uri[0]) {
            if (!isset($uri[1])) {
                return (new SodinimasController)->index();
            }
            if ('list' == $uri[1]) {
                return (new SodinimasController)->list();
            }
            if ('remove' == $uri[1]) {
                return (new SodinimasController)->remove();
            }
            if ('sodintiAgurka' == $uri[1]) {
                return (new SodinimasController)->sodintiAgurka();
            }
            if ('sodintiPaprika' == $uri[1]) {
                return (new SodinimasController)->sodintiPaprika();
            }
            // gera vieta ideti 404 puslapi 
            // TODO: Prideti galima 404

        } elseif ('auginimas' == $uri[0]) {
            if (!isset($uri[1])) {
                return (new AuginimasController)->index();
            }
            if ('list' == $uri[1]) {
                return (new AuginimasController)->list();
            }
            if ('grow' == $uri[1]) {
                return (new AuginimasController)->grow();
            }
        } elseif ('skynimas' == $uri[0]) {
            if (!isset($uri[1])) {
                return (new SkynimasController)->index();
            }
            if ('list' == $uri[1]) {
                return (new SkynimasController)->list();
            }
            if ('skinti' == $uri[1]) {
                return (new SkynimasController)->skinti();
            }
            if ('skintiVisus' == $uri[1]) {
                return (new SkynimasController)->skintiVisus();
            }
            if ('nuskintiVisus' == $uri[1]) {
                return (new SkynimasController)->nuskintiVisus();
            }
        }
    }

    public static function redirect($fileName)
    {
        header('Location: ' . URL . $fileName);
        exit;
    }

    // API Foreign Exchange Rate -----------------------------------------
    public static function getRate($DATA)
    {
        $answer = $DATA->get();

        if ($answer === false) {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, 'https://api.exchangeratesapi.io/latest');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $answer = curl_exec($curl);
            $answer = json_decode($answer);
            $DATA->set($answer);
        }
        $rate = $answer->rates->USD;
        return $rate;
    }
}

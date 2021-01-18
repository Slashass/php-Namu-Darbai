<?php

namespace Main;

use Main\Controllers\SodinimasController;

class App
{

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
            include DIR . '/auginimas.php';
        } elseif ('skynimas' == $uri[0]) {
            include DIR . '/skynimas.php';
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

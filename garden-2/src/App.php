<?php

namespace Main;

class App
{

    public static function router()
    {

        // pasalinam folderi is duomenu
        $uri = str_replace(INSTALL_FOLDER, '', $_SERVER['REQUEST_URI']);

        // duomenis pasiverciam i masyva is uri eilutes
        $uri = explode('/', $uri);

        // Router
        if ('sodinimas' == $uri[0]) {
            include DIR . '/sodinimas.php';
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

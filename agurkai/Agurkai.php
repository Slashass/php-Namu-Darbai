<?php

class Agurkai
{
    public $agurkas = 0;
    public $id = 0;

    public function agurkuSodinimas()
    {
        // sodinimo scenarijus kas vyksta  sodinimo metu
        if (isset($_POST['sodinti'])) {

            $kiekis = (int) $_POST['kiekis'];

            if (0 > $kiekis || 4 < $kiekis) { // <--- validacija
                if (0 > $kiekis) {
                    $_SESSION['err'] = 1; // <-- neigiamas agurku kiekis
                } elseif (4 < $kiekis) {
                    $_SESSION['err'] = 2; // <-- per daug
                }

                header('Location: http://localhost/1stlesson/folder/agurkai/sodinimas.php');
                exit;
            }

            foreach (range(1, $kiekis) as $_) {
                $_SESSION['a'][] = [
                    'id' => ++$_SESSION['agurku ID'],
                    'agurkai' => 0
                ];
            }


            header('Location: http://localhost/1stlesson/folder/agurkai/sodinimas.php');
            exit;
        }
        // isrovimo scenarijus 
        if (isset($_POST['israuti'])) {
            foreach ($_SESSION['a'] as $index => &$agurkas) {
                if ($_POST['israuti'] == $agurkas['id']) {
                    unset($_SESSION['a'][$index]);
                    header('Location: http://localhost/1stlesson/folder/agurkai/sodinimas.php');
                    exit;
                }
            }
        }
    }

    public function agurguAuginimas()
    {
        // auginimo scenarijus
        if (isset($_POST['auginti'])) {

            foreach ($_SESSION['a'] as $index => &$agurkas) {
                $agurkas['agurkai'] += $_POST['kiekis'][$agurkas['id']];
            }
            header('Location: http://localhost/1stlesson/folder/agurkai/auginimas.php');
            exit;
        }
    }

    public function agurkuSkynimas()
    {
        // skinti kazkoki kieki irasius
        if (isset($_POST['skinti'])) {
            foreach ($_SESSION['a'] as $index => &$agurkas) {
                if ($_POST['kiek'][$agurkas['id']] <= $agurkas['agurkai']) {
                    $agurkas['agurkai'] -= $_POST['kiek'][$agurkas['id']];
                }
            }
            header('Location: http://localhost/1stlesson/folder/agurkai/skynimas.php');
            exit;
        }
        // skinti visus 
        if (isset($_POST['skinti-visus'])) {
            foreach ($_SESSION['a'] as &$agurkas) {
                if ($_POST['skinti-visus'] == $agurkas['id']) {
                    $agurkas['agurkai'] = 0;
                }
            }
            header('Location: http://localhost/1stlesson/folder/agurkai/skynimas.php');
            exit;
        }
        // nuimti visa derliu
        if (isset($_POST['nuskinti-viska'])) {
            foreach ($_SESSION['a'] as &$agurkas) {
                if ($_POST['kiek'][$agurkas['id']] <= $agurkas['agurkai']) {
                    $agurkas['agurkai'] = 0;
                }
            }
            header('Location: http://localhost/1stlesson/folder/agurkai/skynimas.php');
            exit;
        }
    }
}

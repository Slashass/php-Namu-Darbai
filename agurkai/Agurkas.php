<?php

class Agurkas
{

    private $id, $count;

    // public $propertyName;

    public static function nuimtiDerliu($visiAgurkai) // <----- $visiAgurkai = $_SESSION['obj']
    {
        foreach ($visiAgurkai as $index => $agurkas) { // <---- serializuotas stringas
            $agurkas = unserialize($agurkas); // <----- agurko objektas
            $agurkas->nuskintiVisus();
            $agurkas = serialize($agurkas); // <------ vel stringas
            $visiAgurkai[$index] = $agurkas; // <----- uzsaugom agurkus
        }
        return $visiAgurkai;
    }

    public function __construct($lastId)
    {
        $this->id = $lastId + 1;
        $this->count = 0;

        // $agurkoObj->id = $_SESSION['agurku ID'] + 1;
        // $agurkoObj->count = 0;
    }


    public function __get($propertyName)
    {
        return $this->$propertyName;
    }

    public function __set($propertyName, $value)
    {
        $this->$propertyName = $value;
    }


    public function addAgurkas($agurkai)
    {
        $this->count = $this->count + $agurkai;
    }

    public function nuskintiVisus()
    {
        $this->count = 0;
    }

    // Visai nebutina
    // public function __serialize() // <---- ivyksta kai objektas yra serializuojamas
    // {

    // }

    // KITAS VARIANTAS __________________________________________________________

    // public $agurkas = 0;
    // public $id = 0;

    //     final public function agurkuSodinimas()
    //     {
    //         // sodinimo scenarijus kas vyksta  sodinimo metu
    //         if (isset($_POST['sodinti'])) {

    //             $kiekis = (int) $_POST['kiekis'];

    //             if (0 > $kiekis || 4 < $kiekis) { // <--- validacija
    //                 if (0 > $kiekis) {
    //                     $_SESSION['err'] = 1; // <-- neigiamas agurku kiekis
    //                 } elseif (4 < $kiekis) {
    //                     $_SESSION['err'] = 2; // <-- per daug
    //                 }

    //                 header('Location: http://localhost/1stlesson/folder/agurkai/sodinimas.php');
    //                 exit;
    //             }

    //             foreach (range(1, $kiekis) as &$agurkas) {
    //                 $_SESSION['a'][] = [
    //                     'id' => ++$_SESSION['agurku ID'],
    //                     'agurkai' => 0
    //                 ];
    //             }


    //             header('Location: http://localhost/1stlesson/folder/agurkai/sodinimas.php');
    //             exit;
    //         }
    //         // isrovimo scenarijus 
    //         if (isset($_POST['israuti'])) {
    //             foreach ($_SESSION['a'] as $index => &$agurkas) {
    //                 if ($_POST['israuti'] == $agurkas['id']) {
    //                     unset($_SESSION['a'][$index]);
    //                     header('Location: http://localhost/1stlesson/folder/agurkai/sodinimas.php');
    //                     exit;
    //                 }
    //             }
    //         }
    //     }

    //     final public function agurguAuginimas()
    //     {
    //         // auginimo scenarijus
    //         if (isset($_POST['auginti'])) {

    //             foreach ($_SESSION['a'] as $index => &$agurkas) {
    //                 $agurkas['agurkai'] += $_POST['kiekis'][$agurkas['id']];
    //             }
    //             header('Location: http://localhost/1stlesson/folder/agurkai/auginimas.php');
    //             exit;
    //         }
    //     }

    //     final public function agurkuSkynimas()
    //     {
    //         // skinti kazkoki kieki irasius
    //         if (isset($_POST['skinti'])) {
    //             foreach ($_SESSION['a'] as $index => &$agurkas) {
    //                 if ($_POST['kiek'][$agurkas['id']] <= $agurkas['agurkai']) {
    //                     $agurkas['agurkai'] -= $_POST['kiek'][$agurkas['id']];
    //                 }
    //             }
    //             header('Location: http://localhost/1stlesson/folder/agurkai/skynimas.php');
    //             exit;
    //         }
    //         // skinti visus 
    //         if (isset($_POST['skinti-visus'])) {
    //             foreach ($_SESSION['a'] as &$agurkas) {
    //                 if ($_POST['skinti-visus'] == $agurkas['id']) {
    //                     $agurkas['agurkai'] = 0;
    //                 }
    //             }
    //             header('Location: http://localhost/1stlesson/folder/agurkai/skynimas.php');
    //             exit;
    //         }
    //         // nuimti visa derliu
    //         if (isset($_POST['nuskinti-viska'])) {
    //             foreach ($_SESSION['a'] as &$agurkas) {
    //                 if ($_POST['kiek'][$agurkas['id']] <= $agurkas['agurkai']) {
    //                     $agurkas['agurkai'] = 0;
    //                 }
    //             }
    //             header('Location: http://localhost/1stlesson/folder/agurkai/skynimas.php');
    //             exit;
    //         }
    //     }
}

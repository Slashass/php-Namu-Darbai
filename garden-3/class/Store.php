<?php
namespace Main;

use Cucumber\Agurkas;
use Peper\Paprika;

interface Store {

    // function getData();
    // function setData($data);
    function getNewId();
    function addNewAgurkas(Agurkas $agurkasObj);
    function addNewPaprika(Paprika $paprikaObj);
    function getAll();
    function remove($id);

}
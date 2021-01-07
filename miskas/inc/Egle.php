  
<?php

namespace Eglynas;

use Mano\Vovere as ManoGraziVovere;
use Petras\Zzz\Vovere as PetroLevaVovere;


class Egle extends ManoGraziVovere
{


    public function __construct()
    {
        echo '<h3>EGLES CONSTRUCT</h3>';
        parent::__construct(); //<---- paleis tevo konstruktoriu

        // App::duokManKazka();
    }
}

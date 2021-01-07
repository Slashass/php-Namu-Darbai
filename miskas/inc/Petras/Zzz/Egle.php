<?php

namespace Petras\Zzz;


use Mano\Vovere as ManoGraziVovere;
use Petras\Zzz\Vovere as PetroLevaVovere;


class Egle extends PetroLevaVovere
{

    public function __construct()
    {
        echo '<h3>EGLES CONSTRUCT</h3>';
        parent::__construct(); //<---- paleis tevo konstruktoriu
    }
}

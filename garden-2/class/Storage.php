<?php

namespace Main;

use Cucumber\Agurkas;
use Peper\Paprika;

class Storage
{

    private const PATH = DIR . '/data/';
    private $fileName = 'garden';
    private $data;


    public function __construct($file)
    {
        $this->filename = $file;
        if (!file_exists(self::PATH . $this->fileName . '.json')) {
            file_put_contents(self::PATH . $this->fileName . '.json', json_encode(['darzoves' => [], 'darzoviu id' => 0])); // pradinis masyvas
            $this->data = ['darzoves' => [], 'darzoviu id' => 0];
        } else {
            $this->data = file_get_contents(self::PATH . $this->fileName . '.json'); // nuskaitom faila
            $this->data = json_decode($this->data, 1); // paverciam masyvu
        }
    }

    public function __destruct()
    {
        file_put_contents(self::PATH . $this->fileName . '.json', json_encode($this->data)); // viska vel uzsaugom
    }

    public function getData()
    {
        return $this->data;
    }
    public function setData($data)
    {
        $this->$data = $data;
    }
    public function getNewId()
    {
        $id = $this->data['darzoviu id'];
        $this->data['darzoviu id']++;
        return $id;
    }
    public function save($darzove, $index)
    {
        $darzove = serialize($darzove);
        $this->data['darzoves'][$index] = $darzove;
    }

    public function addNewAgurkas(Agurkas $agurkasObj)
    {
        $this->data['darzoves'][] = serialize($agurkasObj);
    }

    public function addNewPaprika(Paprika $paprikaObj)
    {
        $this->data['darzoves'][] = serialize($paprikaObj);
    }

    public function getAll()
    {
        $allVegetables = [];
        foreach ($this->data['darzoves'] as $darzove) {
            $allVegetables[] = unserialize($darzove);
        }
        return $allVegetables;
    }

    public function remove($id)
    {
        foreach ($this->data['darzoves'] as $index => $darzove) {
            $darzove = unserialize($darzove);
            if ($darzove->id == $id) {
                unset($this->data['darzoves'][$index]);
            }
        }
    }

    public function grow()
    {
        foreach ($this->data['darzoves'] as $index => $darzove) {
            $darzove = unserialize($darzove);
            $darzove->augintiDarzove($darzove->kiekAugti);
            $darzove->kiekAugti();
            self::save($darzove, $index);
        }
    }

    public function skinti($id, $kiek)
    {
        foreach ($this->data['darzoves'] as $index => $darzove) {
            $darzove = unserialize($darzove);
            if ($darzove->id == $id) {
                if ($darzove->count < $kiek) break;
                $darzove->count -= $kiek;
                self::save($darzove, $index);
            }
        }
    }

    public function skintiVisusVienoAgurko($id)
    {
        foreach ($this->data['darzoves'] as $index => $darzove) {
            $darzove = unserialize($darzove);
            if ($darzove->id == $id) {
                $darzove->nuskintiVisus();
                self::save($darzove, $index);
            }
        }
    }

    public function nuskintiVisus()
    {
        foreach ($this->data['darzoves'] as $index => $darzove) {
            $darzove = unserialize($darzove);
            $darzove->nuskintiVisus();
            self::save($darzove, $index);
        }
    }
}

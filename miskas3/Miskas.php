<?php
class Miskas
{

    public $title = 'Giria';
    protected $age = 587;
    private $area = 1000;

    public static $treeCount = 2000;

    public static $c = 0;


    //--------------------------------------


    public static function showRedDots()
    {
        echo '<h1 style="color:red;">.......</h1>';
    }

    public static function showTreeCount()
    {
        echo '<h1 style="color:red;">' . self::$treeCount . '</h1>';
    }

    public static function showTreeCount2()
    {
        echo '<h1 style="color:red;">' . static::$treeCount . '</h1>';
    }



    public function __construct()
    {
        echo '<h4>MISKO KONSTRUKTORIUS</h4>';
        // _dc(self::$treeCount);
        // self::showRedDots();
    }


    public function __destruct()
    {
        echo '<h4>MISKO DESTRUKTORIUS</h4>';
    }


    // public function setAge($newAge)
    // {
    //     $this->age = $newAge;
    // }


    public function __set($prop, $val)
    {
        // if(self::$c++ >10)return;

        echo "<h4>MISKO SETERIS: $prop - $val</h4>";

        $this->$prop = $val;
    }

    public function __get($prop)
    {
        echo "<h4>MISKO GETERIS: $prop</h4>";

        return $this->$prop;
    }

    public function __call($name, $args)
    {
        echo "<h4>MISKO CALLAS: $name</h4>";

        if ('doEcho' == $name) {
            $this->makeEcho(...$args);
        }
    }

    public function __invoke(...$x)
    {
        var_dump($x);
        var_dump($this);
    }



    private function doEcho()
    {
        echo '<br>Aūū<->ūū<->ūū!';
    }


    public function makeEcho($time)
    {
        self::showRedDots();
        foreach (range(1, $time) as $_) {
            $this->doEcho();
        }
    }



    public function getIt() // <-- geteris gauna $area
    {
        return $this->area;  // <--- privati savybe pasiekiama, nes kvieciama klases viduje
    }


    public function setIt($newArea) // <-- seteris keicia $area
    {
        if ($newArea > 1000) {
            echo '<h1>Per didelis plotas</h1>';
            return;
        }
        $this->area = $newArea;
    }



    // if($a == 1) { <------ viskas turi būti metodo viduje

    // }

}

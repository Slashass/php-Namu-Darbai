<?php

namespace Valio;

use Ramsey\Uuid\Uuid;

class Miskas
{

    private $area = 1000;
    protected $animals = 0;
    public $name = 'Gyvulys';

    public static $title = 'Misko Giria';

    public function __construct()
    {
        echo '<h3>MISKO CONSTRUCT</h3>';
        echo Uuid::uuid4();
    }

    public function __destruct()
    {
        echo '<h3>MISKO DESTRUCT</h3>';
    }

    public static function __callStatic($name, $val)
    {
        echo "<h3>MISKO CALL: $name</h3>";
        print_r($val);
    }


    public function __invoke($arg)
    {
        print_r($arg);
    }

    public function makeNoise()
    {
        echo '<h1>' . $this->voice . '<h1>';
    }

    public function getArea()
    {
        return $this->area;
    }


    public static function getSelfName()
    {
        return self::$title;
    }
    public static function getStaticName()
    {
        return static::$title;
    }
}

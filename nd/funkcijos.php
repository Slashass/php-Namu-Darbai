<?php

$labas = 'Hello'; // global scope

function pasveikinimas(&$arg)
{
    $arg = 'hi5';
    echo "viduje: $arg<br>";
}

pasveikinimas($labas);
echo "Isore: $labas";

echo '<br>';
echo 'Recursion ----------------------------------------------';

function recursive($num)
{
    echo $num, '<br>';
    if ($num < 4) {
        //kvieciame save. Padidiname numeri vienetu.
        return recursive($num + 1);
    }
    echo $num, 'BOTTOM<br>';
    return $num;
}
$startNum = 1;

// var_dump(recursive($startNum));

recursive($startNum);

echo '<br>';
echo 'Use ----------------------------------------------';

$result = 0;

$two = function () use ($result) {
    var_dump($result);
};

$result++;
$two();

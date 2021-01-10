<?php

$jonas = rand(5, 25);
$petras = rand(10, 20);

echo "Jonas: $jonas Petras: $petras";
echo '<br>';
if ($jonas > $petras) {
    echo 'Jonas kietas';
} elseif ($jonas < $petras) {
    echo 'Petras kietas';
} else {
    echo 'Lygiosios';
}

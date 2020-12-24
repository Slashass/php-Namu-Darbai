<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uzd 10</title>
</head>

<?php
/*
10. Pakartokite 9 uždavinį. Padarykite taip, kad atsirastų du skaičiai. Vienas rodytų kiek buvo pažymėta, 
o kitas kiek iš vis buvo jų sugeneruota.
*/

if (empty($_POST)) {
    echo '<form method=\'POST\'>';
    $rand = rand(3, 10);
    for ($i = 0; $i < $rand; $i++) {
        echo '<input type=\'checkbox\' name=' . chr(65 + $i) . ' value=' . $i . '>
  <label for=\'vehicle1\'>' . chr(65 + $i) . '</label><br>';
    }

    echo '
  <button name=\'Submit\' value=' . $i . '>Submit</button>
</form>';
} else {
    echo 'Pazymeta checkbox: ' . (count($_POST) - 1);
    echo '<br>Viso checkbox: ' . $_POST['Submit'];
}

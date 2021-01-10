<h2>1 uzduotis</h2>
<?php

$vardas = 'Mazvydas';
$pavarde = 'Cizauskas';
$birthDate = 1995;
$nowDate = 2020;

$manoMetai = $nowDate - $birthDate;

echo "Mano vardas $vardas $pavarde. Man yra $manoMetai metai.";
echo '<br>';
echo '<br>';

?>
<h2>2 uzduotis</h2>

<?php

$kintamasis1 = rand(0, 4);
$kintamasis2 = rand(0, 4);

echo "Kintamasis 1 = $kintamasis1 ; Kintamasis2 = $kintamasis2";
echo '<br>';

if ($kintamasis1 > $kintamasis2 && $kintamasis2 === 0 || $kintamasis1 < $kintamasis2 && $kintamasis1 === 0) {
    echo 'Negalima dalyba is 0';
} elseif ($kintamasis1 > $kintamasis2) {
    echo round(($kintamasis1 / $kintamasis2), 2);
} elseif ($kintamasis1 < $kintamasis2) {
    echo round(($kintamasis2 / $kintamasis1), 2);
} elseif ($kintamasis1 === $kintamasis2) {
    echo 'Skaiciai vienodi';
}

?>
<h2>3 uzduotis</h2>

<?php

$skaicius1 = rand(0, 25);
$skaicius2 = rand(0, 25);
$skaicius3 = rand(0, 25);

echo "Skaicius 1 = $skaicius1 ; skaicius 2 = $skaicius2 ; skaicius 3 = $skaicius3";
echo '<br>';

if ($skaicius1 === $skaicius2 || $skaicius2 === $skaicius3 || $skaicius1 === $skaicius3) {
    echo 'Neturi vidurines reiksmes';
} elseif ($skaicius1 < $skaicius2 && $skaicius2 < $skaicius3 || $skaicius2 > $skaicius3 && $skaicius2 < $skaicius1) {
    echo $skaicius2;
} elseif ($skaicius2 < $skaicius1 && $skaicius1 < $skaicius3 || $skaicius1 > $skaicius3 && $skaicius1 < $skaicius2) {
    echo $skaicius1;
} elseif ($skaicius1 < $skaicius3 && $skaicius3 < $skaicius2 || $skaicius3 < $skaicius1 && $skaicius3 > $skaicius2) {
    echo $skaicius3;
}

?>
<h2>4 uzduotis</h2>

<?php

$a = rand(0, 10);
$b = rand(0, 10);
$c = rand(0, 10);

echo "Krastine 1 = $a ; Krastine 2 = $b ; Krastine 3 = $c";
echo '<br>';

if ($a === 0 || $b === 0 || $c === 0) {
    echo 'Trikampio neimanoma padaryti';
} elseif (($a + $b) > $c || ($a + $c) > $b || ($b + $c) > $a) {
    echo 'Trikampis pasidaro';
} else {
    echo 'Trikampis nepasidaro';
}

?>
<h2>5 uzduotis</h2>

<?php

$countNr1 = rand(0, 2);
$countNr2 = rand(0, 2);
$countNr3 = rand(0, 2);
$countNr4 = rand(0, 2);

$count0 = $count1 = $count2 = 0;

${'count' . $countNr1}++;
${'count' . $countNr2}++;
${'count' . $countNr3}++;
${'count' . $countNr4}++;

echo "0 kartų: $count0 <br> 
        1 kartų: $count1 <br> 
        2 kartų: $count2";

// for ($i=0; $i < ; $i++) { 
//     # code...
// }

?>
<h2>6 uzduotis</h2>

<?php

$hTagNr = rand(1, 6);

print_r("<h$hTagNr>$hTagNr<h$hTagNr>");

?>
<h2>7 uzduotis</h2>

<?php

$colorNr1 = rand(-10, 10);
$colorNr2 = rand(-10, 10);
$colorNr3 = rand(-10, 10);

if ($colorNr1 < 0) {
    echo "<i style='color:green;'>num1= $colorNr1</i> <br>";
} elseif ($colorNr1 > 0) {
    echo "<i style='color:blue;'>num1= $colorNr1</i> <br>";
} else {
    echo "<i style='color:red;'>num1= $colorNr1</i> <br>";
}
// echo "<i style='color:green;'>num1= $colorNr1</i> <br>";
// echo $colorNr1;
// echo '<br>';

if ($colorNr2 < 0) {
    echo "<i style='color:green;'>num2= $colorNr2</i> <br>";
} elseif ($colorNr2 > 0) {
    echo "<i style='color:blue;'>num2= $colorNr2</i> <br>";
} else {
    echo "<i style='color:red;'>num2= $colorNr2</i> <br>";
}

// echo $colorNr2;
// echo '<br>';

if ($colorNr3 < 0) {
    echo "<i style='color:green;'>num3= $colorNr3</i> <br>";
} elseif ($colorNr3 > 0) {
    echo "<i style='color:blue;'>num3= $colorNr3</i> <br>";
} else {
    echo "<i style='color:red;'>num3= $colorNr3</i> <br>";
}

// echo $colorNr3;
// echo '<br>';

// echo "<i style='color:green;'>num1= $colorNr1</i> <br>";
// echo "<i style='color:red;'>num1= $colorNr2</i> <br>";
// echo "<i style='color:blue;'>num1= $colorNr3</i> <br>";

// if ($colorNr1 < 0 || $colorNr2 < 0 || $colorNr3 < 0) {
//     echo "<i style='color:green;'>num1= $colorNr1 </i> <br>";
//     echo "<i style='color:green;'>num1= $colorNr2 </i> <br>";
//     echo "<i style='color:green;'>num1= $colorNr3 </i> <br>";
// } elseif ($colorNr2 < 0) {
//     // echo "<i style='color:red;'>num1= $colorNr2 </i> <br>";
// }


?>

<h2>8 uzduotis</h2>

<?php

$zvakiuKiekis = rand(5, 3000);
$vienosKaina = 1;

if ($zvakiuKiekis <= 1000) {
    echo "Zvakiu kiekis: $zvakiuKiekis : Kaina: ";
    print_r($zvakiuKiekis * $vienosKaina);
} elseif ($zvakiuKiekis > 1000 && $zvakiuKiekis <= 2000) {
    echo "Zvakiu kiekis: $zvakiuKiekis : Kaina: ";
    var_dump(($zvakiuKiekis * $vienosKaina) * 0.97);
} elseif ($zvakiuKiekis > 2000) {
    echo "Zvakiu kiekis: $zvakiuKiekis : Kaina: ";
    var_dump(($zvakiuKiekis * $vienosKaina) * 0.96);
}


?>

<h2>9 uzduotis</h2>

<?php

$vidurkis1 = rand(0, 100);
$vidurkis2 = rand(0, 100);
$vidurkis3 = rand(0, 100);

// echo $vidurkis1;
// echo "<br>";

$aritmetinisVidurkis = ($vidurkis1 + $vidurkis2 + $vidurkis3) / 3;

echo "Vidurkis - ", round($aritmetinisVidurkis), "<br>";

$vidurkis1 = rand(10, 90);
$vidurkis2 = rand(10, 90);
$vidurkis3 = rand(10, 90);

// echo $vidurkis1;
// echo "<br>";

$aritmetinisVidurkis = ($vidurkis1 + $vidurkis2 + $vidurkis3) / 3;


echo "Vidurkis (10 - 90) - ", round($aritmetinisVidurkis);

?>

<h2>10 uzduotis</h2>

<?php

echo "Dabar laikas: ";
print gmdate("H:i:s\ ");
echo "<br>";

$papildomosSekundes = rand(0, 300);

echo $papildomosSekundes;
echo "<br>";

$naujasLaikas = time() + $papildomosSekundes;
$convertedTime = gmdate("H:i:s", $naujasLaikas);

echo "Naujas Laikas: ";
echo $convertedTime;


?>

<h2>11 uzduotis</h2>

<?php

$Nr1 = rand(1000, 9999);
$Nr2 = rand(1000, 9999);
$Nr3 = rand(1000, 9999);
$Nr4 = rand(1000, 9999);
$Nr5 = rand(1000, 9999);
$Nr6 = rand(1000, 9999);

echo "Skaičiai: $Nr1, $Nr2, $Nr3, $Nr4, $Nr5, $Nr6 <br>";

// $temporaryNum0 = $temporaryNum1 = $temporaryNum2 = $temporaryNum3 = $temporaryNum4 = $temporaryNum5 = 0;

${'temporaryNum' . (
    ($Nr1 > $Nr2 ? 1 : 0) +
    ($Nr1 > $Nr3 ? 1 : 0) +
    ($Nr1 > $Nr4 ? 1 : 0) +
    ($Nr1 > $Nr5 ? 1 : 0) +
    ($Nr1 > $Nr6 ? 1 : 0))} = $Nr1;
${'temporaryNum' . (
    ($Nr2 > $Nr1 ? 1 : 0) +
    ($Nr2 > $Nr3 ? 1 : 0) +
    ($Nr2 > $Nr4 ? 1 : 0) +
    ($Nr2 > $Nr5 ? 1 : 0) +
    ($Nr2 > $Nr6 ? 1 : 0) +
    ($Nr2 == $Nr1 ? 1 : 0))} = $Nr2;
${'temporaryNum' . (
    ($Nr3 > $Nr2 ? 1 : 0) +
    ($Nr3 > $Nr1 ? 1 : 0) +
    ($Nr3 > $Nr4 ? 1 : 0) +
    ($Nr3 > $Nr5 ? 1 : 0) +
    ($Nr3 > $Nr6 ? 1 : 0) +
    ($Nr3 == $Nr1 ? 1 : 0) +
    ($Nr3 == $Nr2 ? 1 : 0))} = $Nr3;
${'temporaryNum' . (
    ($Nr4 > $Nr2 ? 1 : 0) +
    ($Nr4 > $Nr3 ? 1 : 0) +
    ($Nr4 > $Nr1 ? 1 : 0) +
    ($Nr4 > $Nr5 ? 1 : 0) +
    ($Nr4 > $Nr6 ? 1 : 0) +
    ($Nr4 == $Nr1 ? 1 : 0) +
    ($Nr4 == $Nr2 ? 1 : 0) +
    ($Nr4 == $Nr3 ? 1 : 0))} = $Nr4;
${'temporaryNum' . (
    ($Nr5 > $Nr2 ? 1 : 0) +
    ($Nr5 > $Nr3 ? 1 : 0) +
    ($Nr5 > $Nr4 ? 1 : 0) +
    ($Nr5 > $Nr1 ? 1 : 0) +
    ($Nr5 > $Nr6 ? 1 : 0) +
    ($Nr5 == $Nr1 ? 1 : 0) +
    ($Nr5 == $Nr2 ? 1 : 0) +
    ($Nr5 == $Nr3 ? 1 : 0) +
    ($Nr5 == $Nr4 ? 1 : 0))} = $Nr5;
${'temporaryNum' . (
    ($Nr6 > $Nr2 ? 1 : 0) +
    ($Nr6 > $Nr3 ? 1 : 0) +
    ($Nr6 > $Nr4 ? 1 : 0) +
    ($Nr6 > $Nr5 ? 1 : 0) +
    ($Nr6 > $Nr1 ? 1 : 0) +
    ($Nr6 == $Nr1 ? 1 : 0) +
    ($Nr6 == $Nr2 ? 1 : 0) +
    ($Nr6 == $Nr3 ? 1 : 0) +
    ($Nr6 == $Nr4 ? 1 : 0) +
    ($Nr6 == $Nr5 ? 1 : 0))} = $Nr6;

// $result = "$temporaryNum0 $temporaryNum1 $temporaryNum2 $temporaryNum3 $temporaryNum4 $temporaryNum5"; // Nuo mažiausio
$result = "$temporaryNum5 $temporaryNum4 $temporaryNum3 $temporaryNum2 $temporaryNum1 $temporaryNum0"; // Nuo didžiausio
echo "Rezultatas: $result";

?>
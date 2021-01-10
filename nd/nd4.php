<h2>Masyvai</h2>

<?php
/*
1. Sugeneruokite masyvą iš 30 elementų (indeksai nuo 0 iki 29), 
kurių reikšmės yra atsitiktiniai skaičiai nuo 5 iki 25.
*/
echo '<h3>1............................................................................................</h3>';
$array = [];
for ($i = 0; $i < 30; $i++) array_push($array, rand(5, 25));

echo '<pre>';
print_r($array);
echo '</pre>';


/*
2. Naudodamiesi 1 uždavinio masyvu:
Suskaičiuokite kiek masyve yra reikšmių didesnių už 10;
Raskite didžiausią masyvo reikšmę;
Suskaičiuokite visų reikšmių sumą;
Sukurkite naują masyvą, kurio reikšmės yra 1 uždavinio masyvo reikšmes minus tos reikšmės indeksas;
Papildykite masyvą papildomais 10 elementų su reikšmėmis nuo 5 iki 25, kad bendras masyvas padidėtų iki indekso 39;
Iš masyvo elementų sukurkite du naujus masyvus. Vienas turi būti sudarytas iš neporinių indekso reikšmių, o kitas iš porinių;
Masyvo elementus su poriniais indeksais padarykite lygius 0 jeigu jie didesni už 15;
Suraskite pirmą (mažiausią) indeksą, kurio elemento reikšmė didesnė už 10;
Naudodami funkciją unset() iš masyvo ištrinkite visus elementus turinčius porinį indeksą;
*/
echo '<h3>2............................................................................................</h3>';
echo 'Masyve yra reikšmių didesnių už 10: ' . count(array_filter($array, function ($x) {
    return $x > 10;
}));
//
echo '<br>Didžiausia masyvo reikšmė: ' . max($array);
//
echo '<br>Visų reikšmių suma: ' . array_sum($array);
//
echo '<br>Naujas masyvas(1 uždavinio masyvo reikšmes minus tos reikšmės indeksas):<pre>';
$arrayNew = array_map(function ($a, $b) {
    return ($a - $b);
}, $array, array_keys($array));
print_r($arrayNew);
echo '</pre>';
//
echo '<br>+10 su reiksme 5 - 25:<pre>';
for ($i = 0; $i < 10; $i++) $arrayNew[] = rand(5, 25);
print_r($arrayNew);
echo '</pre>';
//
$arrayEven = [];
$arrayOdd = [];
foreach ($arrayNew as $key => $item) $key % 2 ? $arrayOdd[$key] = $item : $arrayEven[$key] = $item;
echo '<br>Nelyginiu indexu masyvas:<pre>';
print_r($arrayOdd);
echo '<br></pre>Lyginiu indexu masyvas:<pre><br>';
print_r($arrayEven);
echo '</pre>';
//
echo '<br>Masyvo elementus su poriniais indeksais padarykite lygius 0 jeigu jie didesni už 15:<pre>';
$array = array_map(function ($a, $b) {
    return (!($b % 2) && $a > 15) ? 0 : $a;
}, $array, array_keys($array));
print_r($array);
echo '</pre>';
//
foreach ($arrayNew as $key => $item) {
    if ($item > 10) {
        echo "Suraskite pirmą (mažiausią) indeksą, kurio elemento reikšmė didesnė už 10: $key";
        break;
    }
}
//
foreach ($arrayNew as $key => $item) if (!($key % 2)) unset($arrayNew[$key]);
echo '<br><br>unset():<pre>';
print_r($arrayNew);
echo '</pre>';


/*
3.Sugeneruokite masyvą, kurio reikšmės atsitiktinės raidės A, B, C ir D, o ilgis 200.
Suskaičiuokite kiek yra kiekvienos raidės.
*/
echo '<h3>3............................................................................................</h3>';
$array = [];
while (count($array) < 200) $array[] = chr(rand(65, 68));
$charA = $charB = $charC = $charD = 0;
foreach ($array as $item) {
    ${'char' . $item}++;
}
echo "A: $charA, B: $charB, C: $charC, D: $charD";

/*
4.Išrūšiuokite 3 uždavinio masyvą pagal abecėlę.
*/
echo '<h3>4............................................................................................</h3>';
sort($array);
print_r($array);

/*
5.Sugeneruokite 3 masyvus pagal 3 uždavinio sąlygą. 
Sudėkite masyvus, sudėdami atitinkamas reikšmes.
Paskaičiuokite kiek unikalių reikšmių kombinacijų gavote.
*/
echo '<h3>5............................................................................................</h3>';

$array1 = [];
$array2 = [];
$array3 = [];
for ($i = 0; $i < 200; $i++) {
    $array1[] = chr(rand(65, 68));
    $array2[] = chr(rand(65, 68));
    $array3[] = chr(rand(65, 68));
}

for ($i = 0; $i < 200; $i++) {
    $array1[$i] = $array1[$i] . $array2[$i] . $array3[$i];
}

echo 'Unikaliu reiksmiu: ' . count(array_unique($array1));

/*
6.Sugeneruokite du masyvus, kurių reikšmės yra atsitiktiniai skaičiai nuo 100 iki 999. 
Masyvų ilgiai 100. Masyvų reikšmės turi būti unikalios savo masyve (t.y. neturi kartotis).
*/
echo '<h3>6............................................................................................</h3>';
$array1 = [];
$array2 = [];
while (count($array1) < 100 || count($array2) < 100) {
    $random = rand(100, 999);
    if (!in_array($random, $array1) && count($array1) < 100) $array1[] = $random;
    $random = rand(100, 999);
    if (!in_array($random, $array2) && count($array2) < 100) $array2[] = $random;
}
echo 'array1:';
print_r($array1);
echo '<br><br>array2:';
print_r($array2);

/*
7. Sugeneruokite masyvą, kuris būtų sudarytas iš reikšmių, kurios yra pirmame 6 uždavinio masyve, 
bet nėra antrame 6 uždavinio masyve.
*/
echo '<h3>7............................................................................................</h3>';
$arrayNew = array_diff($array1, $array2);
//$arrayNew = [];
// foreach ($array1 as $item) {
//     if (!in_array($item, $array2)) $arrayNew[] = $item;
// }

echo 'Naujas masyvas is pirmo be antro masyvo reiksmiu: (ilgis ' . count($arrayNew) . ')<br>';
print_r($arrayNew);

/*
8. Sugeneruokite masyvą iš elementų, kurie kartojasi abiejuose 6 uždavinio masyvuose.
*/
echo '<h3>8............................................................................................</h3>';
$arrayNew = array_intersect($array1, $array2);
//$arrayNew = [];
// foreach ($array1 as $item) {
//     if (in_array($item, $array1) && in_array($item, $array2)) $arrayNew[] = $item;
// }

echo 'Sugeneruokite masyvą iš elementų, kurie kartojasi abiejuose 6 uždavinio masyvuose: (ilgis ' . count($arrayNew) . ')<br>';
print_r($arrayNew);


/*
9. Sugeneruokite masyvą, kurio indeksus sudarytų pirmo 6 uždavinio masyvo reikšmės, o jo reikšmės iš būtų antrojo masyvo.
*/
echo '<h3>9............................................................................................</h3>';
$arrayNew = array_combine($array1, $array2);
echo 'Masyvas 6, key is 1, value is 2:<br>';
print_r($arrayNew);


/*
10. Sugeneruokite 10 skaičių masyvą pagal taisyklę: 
Du pirmi skaičiai- atsitiktiniai nuo 5 iki 25. 
Trečias, pirmo ir antro suma. 
Ketvirtas- antro ir trečio suma. 
Penktas trečio ir ketvirto suma ir t.t.
*/
echo '<h3>10............................................................................................</h3>';
$array = [];
while (count($array) < 2) $array[] =  rand(5, 25);
while (count($array) < 10) $array[] =  $array[count($array) - 2] + $array[count($array) - 1];

echo 'Sugeneruokite 10 skaičių masyvą:<br>';
print_r($array);


/*
11.Sugeneruokite 101 elemento masyvą su atsitiktiniais skaičiais nuo 0 iki 300. 
Reikšmes kurios tame masyve yra ne unikalios pergeneruokite iš naujo taip, 
kad visos reikšmės masyve būtų unikalios. 
Išrūšiuokite masyvą taip, kad jo didžiausia reikšmė būtų masyvo viduryje, 
o einant nuo jos link masyvo pradžios ir pabaigos reikšmės mažėtų. 
Paskaičiuokite pirmos ir antros masyvo dalies sumas (neskaičiuojant vidurinės). 
Jeigu sumų skirtumas (modulis, absoliutus dydis) yra didesnis nei | 30 | rūšiavimą kartokite.
(Kad sumos nesiskirtų viena nuo kitos daugiau nei per 30)
*/
echo '<h3>11............................................................................................</h3>';
$array = [];
while (count($array) < 101) $array[] = rand(0, 300);
echo 'Sugeneruokite 101 elemento masyvą:<br>';
print_r($array);
//
echo '<br><br>Pasikartojancius pakeist:<br>';
foreach ($array as $key => $item) {
    while (count(array_keys($array, $array[$key])) > 1) {
        $array[$key] = rand(0, 300);
    }
}
print_r($array);
// RUSIAVIMAS KAI ISKART VISKA SURUSIUOJA KAIP REIKIA, MODULIS NIEKADA NEBUS DIDESNSI UZ 30
// Jeigu sumų skirtumas (modulis, absoliutus dydis) yra didesnis nei | 30 | rūšiavimą kartokite.
// (Kad sumos nesiskirtų viena nuo kitos daugiau nei per 30)
echo '<br><br>Rusiavimas:<br>';
function middleSort($array)
{
    $arrayNew = [];
    array_push($arrayNew, max($array));
    $array = array_diff($array, [max($array)]);
    while (count($array) > 0) {
        $sum1 = array_sum(array_slice($arrayNew, 0, count($arrayNew) / 2));
        $sum2 = array_sum(array_slice($arrayNew, count($arrayNew) / 2 + 1));
        if ($sum1 > $sum2) {
            array_push($arrayNew, max($array));
            $array = array_diff($array, [max($array)]);
            array_unshift($arrayNew, max($array));
            $array = array_diff($array, [max($array)]);
        } else {
            array_unshift($arrayNew, max($array));
            $array = array_diff($array, [max($array)]);
            array_push($arrayNew, max($array));
            $array = array_diff($array, [max($array)]);
        }
    }
    return $arrayNew;
}
$array = middleSort($array);
$sum1 = array_sum(array_slice($array, 0, count($array) / 2));
$sum2 = array_sum(array_slice($array, count($array) / 2 + 1));
$module = abs($sum1 - $sum2);
echo "<br><br>Modulis: $module<br>";
echo '<pre>';
print_r($array);
echo '</pre>';


// KAD RUSIUOT KOL BUS MODULIS MAZIAU UZ 30 REIKIA RANDOM KAZKO, TODEL SEKANTIS KAS YRA ZEMIAU....
// echo '<br><br>Rusiavimas:<br>';
// function middleSort($array)
// {
//     $arrayNew = [];
//     array_push($arrayNew, max($array));
//     $array = array_diff($array, [max($array)]);
//     while (count($array) > 0) {
//         if (rand(0, 1)) {
//             array_push($arrayNew, max($array));
//             $array = array_diff($array, [max($array)]);
//             array_unshift($arrayNew, max($array));
//             $array = array_diff($array, [max($array)]);
//         } else {
//             array_unshift($arrayNew, max($array));
//             $array = array_diff($array, [max($array)]);
//             array_push($arrayNew, max($array));
//             $array = array_diff($array, [max($array)]);
//         }
//     }
//     return $arrayNew;
// }
// $array = middleSort($array);
// print_r($array);
// //

// $sum1 = $sum2 = 0;
// for ($i = 0; $i < (count($array) - 1) / 2; $i++) {
//     $sum1 += $array[$i];
// }
// for ($i = count($array) / 2 + 1; $i < count($array); $i++) {
//     $sum2 += $array[$i];
// }
// $testedTimes = 0;
// while(abs($sum1-$sum2)>30){
//     $array = middleSort($array);
//     $testedTimes++;
//     if($testedTimes>1000){
//         echo'<h1>Rusiavimas sustabdytas ir nekartojamas po 1000 kartu, nes tikriausiai is sugeneruotu skaiciu nesigaus tokios medianos, todel zemiau atvaziduojama su didesne mediana.</h1>';
//     break;}
// }

// $modul = abs($sum1-$sum2);
// echo "<br><br>Modulis: $modul<br>";
// echo '<pre>';
// print_r($array);
// echo '</pre>';

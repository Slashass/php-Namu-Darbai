<h2>Masyvai 2</h2>

<?php
/*
1.Sugeneruokite masyvą iš 10 elementų, 
kurio elementai būtų masyvai iš 5 elementų su reikšmėmis nuo 5 iki 25.
*/
echo '<h3>1............................................................................................</h3>';

foreach (range(0, 9) as $i) {
    $array[$i] = [];
    foreach (range(0, 4) as $u) {
        $array[$i][] = rand(5, 25);
    }
}
echo '<pre>';
print_r($array);
echo '</pre>';

/*
2. Naudodamiesi 1 uždavinio masyvu:
Suskaičiuokite kiek masyve yra elementų didesnių už 10;
Raskite didžiausio elemento reikšmę;
Suskaičiuokite kiekvieno antro lygio masyvų su vienodais indeksais sumas 
(t.y. suma reikšmių turinčių indeksą 0, 1 ir t.t.)
Visus masyvus “pailginkite” iki 7 elementų
Suskaičiuokite kiekvieno iš antro lygio masyvų elementų sumą atskirai ir 
sumas panaudokite kaip reikšmes sukuriant naują masyvą.
T.y. pirma naujo masyvo reikšmė turi būti lygi mažesnio masyvo, 
turinčio indeksą 0 dideliame masyve, visų elementų sumai 
*/
echo '<h3>2............................................................................................</h3>';
$elementsGreater10 = 0;
foreach ($array as $arr1) {
    foreach ($arr1 as $arr2) {
        if ($arr2 > 10) $elementsGreater10++;
    }
}
echo "Didesniu uz 10: $elementsGreater10<br>";
//
$maxNum = 0;
foreach ($array as $arr1) {
    if ($maxNum < max($arr1)) $maxNum = max($arr1);
}
echo "Raskite didžiausio elemento reikšmę: $maxNum <br><br>";
//
echo 'Suma visu 2 lygio masyvu pagal index:<br>';
$values = array_fill(0, 5, 0);
foreach ($array as $arr1) {
    foreach ($arr1 as $key => $arr2) {
        $values[$key] += $arr2;
    }
}
foreach ($values as $key => $value) {
    echo "$key: $value <br>";
}
//
foreach ($array as &$small) {
    foreach (range(0, 1) as $_) {
        $small[] = rand(5, 25);
    }
}

echo '<br>\'pailginkite\' iki 7 elementų:<br>';
echo '<pre>';
print_r($array);
echo '</pre>';
echo '<br>';
//
$newArray = [];
foreach ($array as $item) $newArray[] = array_sum($item);
echo '<br>Naujas masyvas:<br>';
print_r($newArray);
echo '<br>';


/*
3. Sukurkite masyvą iš 10 elementų. 
Kiekvienas masyvo elementas turi būti masyvas su atsitiktiniu kiekiu nuo 2 iki 20 elementų. 
Elementų reikšmės atsitiktinai parinktos raidės iš intervalo A-Z. 
Išrūšiuokite antro lygio masyvus pagal abėcėlę (t.y. tuos kur su raidėm).
*/
echo '<h3>3............................................................................................</h3>';
$array = [];

foreach (range(0, 9) as $i) {
    $array[$i] = [];
    $rand = rand(2, 20);
    foreach (range(0, $rand) as $u) {
        $array[$i][] = chr(rand(65, 90));
    }
    print_r($array[$i]);
    echo '<br>';
}
echo '<br>Surusiuota:<br>';

foreach ($array as $key => $item) {
    sort($array[$key]);
    print_r($array[$key]);
    echo '<br>';
}


/*
4. Išrūšiuokite trečio uždavinio pirmo lygio masyvą taip, 
kad elementai kurių masyvai trumpiausi eitų pradžioje.
*/
echo '<h3>4............................................................................................</h3>';
sort($array);
foreach ($array as $key => $item) {
    print_r($array[$key]);
    echo '<br>';
}


/*
5. Sukurkite masyvą iš 30 elementų. 
Kiekvienas masyvo elementas yra masyvas [user_id => xxx, place_in_row => xxx] 
user_id atsitiktinis unikalus skaičius nuo 1 iki 1000000, 
place_in_row atsitiktinis skaičius nuo 0 iki 100. 
*/
echo '<h3>5............................................................................................</h3>';
$array = [];
foreach (range(0, 29) as $i) {
    $user_id = rand(1, 1000000);
    $place_in_row = rand(1, 100);
    if (in_array($user_id, array_column($array, 'user_id'))) {
        $i--;
        continue;
    }
    if (in_array($place_in_row, array_column($array, 'place_in_row'))) {
        $i--;
        continue;
    }
    $array[$i] = array(
        "user_id" => $user_id,
        "place_in_row" => $place_in_row
    );
    // 
}

echo '<pre>';
print_r($array);
echo '</pre>';


/*
6. Išrūšiuokite 5 uždavinio masyvą pagal user_id didėjančia tvarka. 
Ir paskui išrūšiuokite pagal place_in_row mažėjančia tvarka.
*/
echo '<h3>6............................................................................................</h3>';
asort($array);
echo 'Didejancia tvarka pagal user_id:<pre>';
print_r($array);
echo '</pre>';

usort($array, function ($a, $b) {
    return $a['place_in_row'] < $b['place_in_row'];
});

echo 'Mazejancia tvarka pagal place_in_row:<pre>';
print_r($array);
echo '</pre>';


/*
7. Prie 6 uždavinio masyvo antro lygio masyvų pridėkite dar du elementus: name ir surname. 
Elementus užpildykite stringais iš atsitiktinai sugeneruotų lotyniškų raidžių, kurių ilgiai nuo 5 iki 15.
*/
echo '<h3>7............................................................................................</h3>';
foreach ($array as $key => $item) {
    $name = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyz"), 0, rand(5, 15));
    $surname = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyz"), 0, rand(5, 15));
    $array[$key] += array(
        "name" => $name,
        "surname" => $surname,
    );
}

echo 'Add:<pre>';
print_r($array);
echo '</pre>';


/*
8.Sukurkite masyvą iš 10 elementų. 
Masyvo reikšmes užpildykite pagal taisyklę: 
    generuokite skaičių nuo 0 iki 5.
    Ir sukurkite tokio ilgio masyvą. 
    Jeigu reikšmė yra 0 masyvo nekurkite. 
    Antro lygio masyvo reikšmes užpildykite atsitiktiniais skaičiais nuo 0 iki 10. 
    Ten kur masyvo nekūrėte reikšmę nuo 0 iki 10 įrašykite tiesiogiai.
*/
echo '<h3>8............................................................................................</h3>';
$array = [];
foreach (range(0, 9) as $i) {
    $rand = rand(0, 5);
    if (!$rand) {
        $array[$i] = rand(0, 10);
    }
    foreach (range(0, $rand) as $u) {
        $array[$i][$u] = rand(0, 10);
    }
}

echo 'Masyvai 2 lvl arba tiesiogiai skaiciai jei generuojama 0 masyvu 2lvl:<pre>';
print_r($array);
echo '</pre>';


/*
9.Paskaičiuokite 8 uždavinio masyvo visų reikšmių sumą ir išrūšiuokite masyvą taip, 
kad pirmiausiai eitų mažiausios masyvo reikšmės arba jeigu reikšmė yra masyvas, to masyvo reikšmių sumos.
*/
echo '<h3>9............................................................................................</h3>';
$sum = 0;
foreach ($array as $arrays) {
    if (is_array($arrays)) {
        $sum += array_sum($arrays);
    } else {
        $sum += $arrays;
    }
}
echo "Suma: $sum<br><br>";

usort($array, function ($a, $b) {
    if (is_array($a)) $a = array_sum($a);
    if (is_array($b)) $b = array_sum($b);
    return $a <=> $b;
});


echo '<pre>';
print_r($array);
echo '</pre>';


/*
10.Sukurkite masyvą iš 10 elementų. 
Jo reikšmės masyvai iš 10 elementų. 
Antro lygio masyvų reikšmės masyvai su dviem elementais value ir color. 
Reikšmė value vienas iš atsitiktinai parinktų simbolių: #%+*@裡, 
o reikšmė color atsitiktinai sugeneruota spalva formatu: #XX XXXX. 
Pasinaudoję masyvų atspausdinkite “kvadratą” kurį sudarytų masyvo reikšmės nuspalvintos spalva color.
*/
echo '<h3>10............................................................................................</h3>';

$array = [];
foreach (range(0, 9) as $i) {
    foreach (range(0, 9) as $u) {
        $value = explode(' ', '# % + * @ 裡')[rand(0, 5)];
        $color = substr(md5(rand(0, 99)), 0, 6);
        $array[$i][$u] = array(
            "value" => $value,
            "color" => "#$color"
        );
    }
}
foreach ($array as $arrays) {
    foreach ($arrays as $item) {
        echo '<div class=kvadr style=color:' . $item['color'] . '>' . $item['value'] . '</div>';
    }
    echo '<br>';
}

/*
11.Duotas kodas, generuojantis masyvą:
do {
    $a = rand(0, 1000);
    $b = rand(0, 1000);
} while ($a == $b);
$long = rand(10,30);
$sk1 = $sk2 = 0;
echo '<h3>Skaičiai '.$a.' ir '.$b.'</h3>';
$c = [];
for ($i=0; $i<$long; $i++) {
    $c[] = array_rand(array_flip([$a, $b]));
}
echo '<h4>Masyvas:</h4>';
echo '<pre>';
print_r($c);
echo '</pre>';
Reikia apskaičiuoti kiek buvo $sk1 ir $sk2 naudojantis matematika.
NEGALIMA! naudoti jokių palyginimo operatorių (if-else, swich, ()?:)
NEGALIMA! naudoti jokių regex ir string funkcijų.
GALIMA naudotis tik aritmetiniais veiksmais ir matematinėmis funkcijomis iš skyrelio: https://www.php.net/manual/en/ref.math.php

Jeigu reikia, kodo patogumui galima panaudoti įvairias funkcijas, bet sprendimo pagrindas turi būti matematinis.

Atsakymą reikia pateikti formatu:
echo '<h3>Skaičius 789 yra pakartotas '.$sk1.' kartų, o skaičius 123 - '.$sk2.' kartų.</h3>';
Kur rudi skaičiai yra pakeisti skaičiais $a ir $b generuojamais kodo.
*/
echo '<h3>11............................................................................................</h3>';

do {
    $a = rand(0, 1000);
    $b = rand(0, 1000);
} while ($a == $b);
$long = rand(10, 30);
$sk1 = $sk2 = 0;
echo '<h3>Skaičiai ' . $a . ' ir ' . $b . '</h3>';
$c = [];
for ($i = 0; $i < $long; $i++) {
    $c[] = array_rand(array_flip([$a, $b]));
}
echo '<h4>Masyvas:</h4>';
echo '<pre>';
print_r($c);
echo '</pre>';

foreach ($c as $sk) {
    $sk1 += round($sk / ($a + $b));
}
$sk2 = count($c) - $sk1;
$a = '<span style=color:#8B6742;>' . max($c) . '</span>';
$b = '<span style=color:#8B6742;>' . min($c) . '</span>';

echo '<h3>Skaičius ' . $a . ' yra pakartotas ' . $sk1 . ' kartų, o skaičius ' . $b . ' - ' . $sk2 . ' kartų.</h3>';

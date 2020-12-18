<h2>Ciklai</h2>

<?php
/*
1. Naršyklėje nupieškite linija iš 400 “*”. 
a) Naudodami css stilių “suskaldykite” liniją taip, kad visos žvaigždutės matytųsi ekrane;
b) Programiškai “suskaldykite” žvaigždutes taip, kad vienoje eilutėje nebūtų daugiau nei 50 “*”; 
*/
echo '<h3>1............................................................................................</h3>';
echo 'a)<br>';
for ($i = 0; $i < 400; $i++) echo '*';
echo '<br>b)';
for ($i = 0; $i < 400; $i++) {
    if (!($i % 50)) echo '<br>';
    echo '*';
}

/*
2.Sugeneruokit 300 atsitiktinių skaičių nuo 0 iki 300,
atspausdinkite juos atskirtus tarpais ir suskaičiuokite kiek tarp jų yra didesnių už 150.
Skaičiai didesni nei 275 turi būti raudonos spalvos.
*/
echo '<h3>2............................................................................................</h3>';
$array = [];
$biggerThan150 = 0;
do {
    $rand = rand(0, 300);
    $rand > 150 && $biggerThan150++;
    array_push($array, $rand);
    if ($rand < 275) echo "$rand ";
    else echo "<span style='color:red'> $rand</span>";
} while (count($array) < 300);
echo "<br><br> Didesniu uz 150: $biggerThan150";


/*
3. Vienoje eilutėje atspausdinkite visus skaičius nuo 1 iki atsitiktinio skaičiaus tarp 3000 - 4000 
pvz(aibė nuo 1 iki 3476), kurie dalijasi iš 77 be liekanos. Skaičius atskirkite kableliais. 
Po paskutinio skaičiaus kablelio neturi būti. 
Jeigu reikia, panaudokite css, kad visi rezultatai matytųsi ekrane.
*/
echo '<h3>3............................................................................................</h3>';
$rand = rand(3000, 4000);
$result = '';
for ($i = 1; $i <= $rand; $i++) if (!($i % 77)) $result .= "$i, ";
echo substr($result, 0, -3);

// 2BUDAS
// $rand = rand(3000, 4000);
// $array = [];

// for ($i = 1; $i <= $rand; $i++) {
//     if (!($i % 77)) array_push($array, $i);
// }
// foreach ($array as $key => $item) {
//     echo $item;
//     if ($key != count($array) - 1) {
//         echo ', ';
//     }
// }


/*
4. Nupieškite kvadratą iš “*”, kurio kraštines sudaro 100 “*”. 
Panaudokite css stilių, kad kvadratas ekrane atrodytų kvadratinis.
* * * * * * * * * * *
* * * * * * * * * * *
* * * * * * * * * * *
* * * * * * * * * * *
* * * * * * * * * * *
* * * * * * * * * * *
* * * * * * * * * * *
*/
echo '<h3>4............................................................................................</h3>';
echo '<div class=\'square\'>';
$edges = 10;
for ($i = 0; $i < $edges; $i++) {
    for ($u = 0; $u < $edges; $u++) {
        echo '<span>*</span>';
    }
    echo '<br>';
}
echo '</div>';


/*
5. Prieš tai nupieštam kvadratui nupieškite raudonas istrižaines.
*/
echo '<h3>5............................................................................................</h3>';
echo '<div class=\'square\'>';
$edges = 10;
for ($i = 0; $i < $edges; $i++) {
    for ($u = 0; $u < $edges; $u++) {
        if ($u == $i || $u == $edges - 1 - $i) {
            echo '<span style=\'color:red;\'>*</span>';
        } else {
            echo '<span>*</span>';
        }
    }
    echo '<br>';
}
echo '</div>';


/*
6. Metam monetą. Monetos kritimo rezultatą imituojam rand() funkcija, kur 0 yra herbas, o 1 - skaičius. 
Monetos metimo rezultatus išvedame į ekraną atskiroje eilutėje: “S” jeigu iškrito skaičius 
ir “H” jeigu herbas. Suprogramuokite keturis skirtingus scenarijus kai monetos metimą stabdome:
    Iškritus herbui;
    Tris kartus iškritus herbui;
    Tris kartus iš eilės iškritus herbui;
*/
echo '<h3>6............................................................................................</h3>';
$rand = rand(0, 1);
echo 'Iškrito: ' . ($rand == 0 ? 'H' : 'S');

echo '<br>Stabdome iškritus herbui:';
do {
    $rand = rand(0, 1);
    echo ' ' . ($rand == 0 ? 'H ' : 'S ');
} while ($rand == 1);

echo '<br>Stabdome tris kartus iškritus herbui:';
$herbsCount = 0;
while (true) {
    $rand = rand(0, 1);
    if ($rand == 0) {
        $herbsCount++;
    }
    echo ' ' . ($rand == 0 ? 'H ' : 'S ');
    if ($herbsCount > 2) {
        break;
    }
}

echo '<br>Tris kartus iš eilės iškritus herbui:';
$herbsCount = 0;
while (true) {
    $rand = rand(0, 1);
    if ($rand == 0) {
        $herbsCount++;
    } else {
        $herbsCount = 0;
    }
    echo ' ' . ($rand == 0 ? 'H ' : 'S ');
    if ($herbsCount > 2) {
        break;
    }
}

/*
7. Kazys ir Petras žaidžiai šaškėm. Petras surenka taškų kiekį nuo 10 iki 20, 
Kazys surenka taškų kiekį nuo 5 iki 25. 
Vienoje eilutėje išvesti žaidėjų vardus su taškų kiekiu ir “Partiją laimėjo: ​laimėtojo vardas​”. 
Taškų kiekį generuokite funkcija ​rand()​. 
Žaidimą laimi tas, kas greičiau surenka 222 taškus. 
Partijas kartoti tol, kol kažkuris žaidėjas pirmas surenka 222 arba daugiau taškų.
*/
echo '<h3>7............................................................................................</h3>';
// $petras = rand(10, 20);
// $kazys = rand(5, 25);
// echo "Petras: $petras, Kazys: $kazys, Partiją laimėjo: " . ($petras>$kazys? 'Petras':'Kazys');
$petras = $kazys = 0;
while ($petras < 222 && $kazys < 222) {
    $petras += rand(10, 20);
    $kazys += rand(5, 25);
}
echo "Petras: $petras, Kazys: $kazys, Partiją laimėjo: " . ($petras > $kazys ? 'Petras' : 'Kazys');


/*
8. Reikia nupaišyti pilnavidurį rombą, taip pat, kaip ir pilnavidurį kvadratą 
(https://lt.wikipedia.org/wiki/Rombas), kurio aukštis 21 eilutė. 
Reikia padaryti, kad kiekviena rombo žvaigždutė būtų atsitiktinės RGB spalvos 
(perkrovus puslapį spalvos turi keistis).
*/
echo '<h3>8............................................................................................</h3>';
$edges = 21;
for ($y = 0; $y < $edges; $y++) {
    echo ($y < $edges / 2) ? str_repeat('&nbsp;&nbsp;', $edges / 2 - $y) : str_repeat('&nbsp;&nbsp;', $y - $edges / 2 + 1);
    $stars = ($y < $edges / 2) ?  ($y * 2 + 1) : ($edges - $y) * 2 - 1;
    for ($x = 0; $x < $stars; $x++) {
        $r = rand(0, 255);
        $g = rand(0, 255);
        $b = rand(0, 255);
        echo "<span style='color:rgb($r, $g, $b);'>*</span>";
    }
    echo '<br>';
}

// 2 BUDAS
//
// for ($i = 0; $i < $edges; $i++) {
//     for ($u = 0; $u < $edges; $u++) {
//         if (
//             $edges / 2 < $u - $i ||
//             $edges / 2 > $u + $i + 1 ||
//             $i - $edges / 2 > $u ||
//             $u > $edges - $i + $edges / 2 - 1
//         ) {
//             echo "&nbsp;&nbsp;";
//         } else {
//             $r = rand(0, 255);
//             $g = rand(0, 255);
//             $b = rand(0, 255);
//             echo "<span style='color:rgb($r, $g, $b);'>*</span>";
//             // echo '*';
//         }
//     }
//     echo '<br>';
// }


/*
9. Panaudokite funkciją microtime(). Paskaičiuokite kiek sekundžių užtruks kodą:
$c = "10 bezdzioniu suvalge 20 bananu.";
Įvykdyti 1 milijoną kartų ir palyginkite kiek užtruks įvykdyti kodą: 
$c = '10 bezdzioniu suvalge 20 bananu.';
(Stringas viengubose ir dvigubose kabutėse)
*/
echo '<h3>9............................................................................................</h3>';

$miliseconds = microtime(true);
for ($i = 0; $i < 1000000; $i++) {
    $c = '10 bezdzioniu suvalge 20 bananu.';
}
echo 'Su viengubom \' \' (ms): ' . round((microtime(true) - $miliseconds) * 1000) . '<br>';

$miliseconds = microtime(true);
for ($i = 0; $i < 1000000; $i++) {
    $c = "10 bezdzioniu suvalge 20 bananu.";
}
echo 'Su dvigubom " " (ms): ' . round((microtime(true) - $miliseconds) * 1000) . '<br>';


/*
10. Sumodeliuokite vinies kalimą. 
Įkalimo gylį sumodeliuokite pasinaudodami rand() funkcija. 
Vinies ilgis 8.5cm (pilnai sulenda į lentą).
“Įkalkite” 5 vinis mažais smūgiais. 
Vienas smūgis vinį įkala 5-20 mm. Suskaičiuokite kiek reikia smūgių.
“Įkalkite” 5 vinis dideliais smūgiais. 
Vienas smūgis vinį įkala 20-30 mm, 
bet yra 50% tikimybė (pasinaudokite rand() funkcija tikimybei sumodeliuoti), 
kad smūgis nepataikys į vinį. Suskaičiuokite kiek reikia smūgių.
*/
echo '<h3>10............................................................................................</h3>';
// smugis = 5-20mm
$array = array_fill(0, 4, 0);
$hits = 0;

for ($i = 0; $i < count($array); $i++) {
    while ($array[$i] < 85) {
        $array[$i] += rand(5, 20);
        $hits++;
    }
}

echo 'a) Kalant po 5-20mm, prireike smugiu: ' . $hits;

// smugis = 20-30mm
$array = array_fill(0, 4, 0);
$hits = 0;

for ($i = 0; $i < count($array); $i++) {
    while ($array[$i] < 85) {
        if (rand(0, 1)) {
            $array[$i] += rand(20, 30);
        }
        $hits++;
    }
}

echo '<br>b) Kalant po 20-30mm, prireike smugiu(50% tikimybe  nepataikyt): ' . $hits;


/*
11. Sugeneruokite stringą, kurį sudarytų 50 atsitiktinių skaičių nuo 1 iki 200, atskirtų tarpais. 
Skaičiai turi būti unikalūs (t.y. nesikartoti). 
Sugeneruokite antrą stringą, pasinaudodami pirmu, palikdami jame tik pirminius skaičius 
(t.y tokius, kurie dalinasi be liekanos tik iš 1 ir patys savęs). 
Skaičius stringe sudėliokite didėjimo tvarka, nuo mažiausio iki didžiausio.
*/
echo '<h3>11............................................................................................</h3>';
$str = '';
while (count(explode(' ', $str)) < 50) {
    $random = rand(1, 200);
    if (!in_array($random, explode(' ', $str))) $str .= " $random";
}
echo $str . '<br><br>';

$strNew = '';
foreach (explode(' ', $str) as $item) {
    $item = (int) $item;
    if ($item == 1 || $item == 0) continue;
    for ($i = 2; $i <= $item / 2; $i++) {
        if ($item % $i == 0) continue 2;
    }
    $strNew .= "$item ";
}

$strNew = explode(' ', $strNew);
sort($strNew);
echo implode(' ', $strNew);

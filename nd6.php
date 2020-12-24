<h2>Funkcijos</h2>
<h3>Uzduotis 1</h3>

<?php
/*
1.Parašykite funkciją, kurios argumentas būtų tekstas, kuris yra įterpiamas į h1 tagą;
*/
echo '<h3>1............................................................................................</h3>';
function toH1($str)
{
    return "<h1>$str</h1>";
}
echo toH1('toH1(\'text\')');


/*
2.Parašykite funkciją su dviem argumentais, pirmas argumentas tekstas, 
įterpiamas į h tagą, o antrasis tago numeris (1-6). 
Rašydami šią funkciją remkitės pirmame uždavinyje parašytą funkciją;
*/
echo '<h3>2............................................................................................</h3>';

function toSpecifiedH($str, $h)
{
    return "<h$h>$str</h$h>";
}
echo toSpecifiedH('toSpecifiedH(\'text\', 2)', 2);

/*
3.Generuokite atsitiktinį stringą, pasinaudodami kodu md5(time()). 
Visus skaitmenis stringe įdėkite į h1 tagą. 
Jegu iš eilės eina keli skaitmenys, juos į tagą reikią dėti kartu 
(h1 atsidaro prieš pirmą ir užsidaro po paskutinio) 
Keitimui naudokite pirmo uždavinio funkciją;
*/
echo '<h3>3............................................................................................</h3>';

$str = md5(time());
echo "String: $str ";
$tempString = '';
for ($i = 0; $i < strlen($str); $i++) {
    if (is_numeric($str[$i])) {
        $tempString .= $str[$i];
        if (!isset($str[$i + 1]) || isset($str[$i + 1]) & !is_numeric($str[$i + 1])) {
            echo toH1($tempString);
            $tempString = '';
        }
    } else {
        echo $str[$i];
    }
}

// preg_replace_callback('/\d+/', 'h1CallBack', $string);

/*
4.Parašykite funkciją, kuri skaičiuotų, iš kiek sveikų skaičių jos argumentas dalijasi be liekanos 
(išskyrus vienetą ir patį save) Argumentą užrašykite taip, kad būtų galima įvesti tik sveiką skaičių;
*/
echo '<h3>4............................................................................................</h3>';
function divisionRemainders($str)
{
    $result = 0;
    for ($i = 2; $i < $str; $i++) {
        if ($str % $i == 0) $result += 1;
    }
    return $result;
}
$rand = rand(100000, 999999);
echo $rand . ' dalinasi be liekanos iš ' . divisionRemainders($rand) . ' skaičių.';


/*
5.Sugeneruokite masyvą iš 100 elementų, kurio reikšmės atsitiktiniai skaičiai nuo 33 iki 77. 
Išrūšiuokite masyvą pagal daliklių be liekanos kiekį mažėjimo tvarka, 
panaudodami ketvirto uždavinio funkciją.
*/
echo '<h3>5............................................................................................</h3>';
$array = [];
for ($i = 0; $i < 100; $i++) {
    array_push($array, rand(33, 77));
}

usort($array, function ($a, $b) {
    return divisionRemainders($b) <=> divisionRemainders($a);
});

echo 'Surusiuota pagal dalikliu be liekanos kieki mazejimo tvarka: <br><pre>';
print_r($array);
echo '</pre>';

/*
6.Sugeneruokite masyvą iš 100 elementų, kurio reikšmės atsitiktiniai skaičiai nuo 333 iki 777. 
Naudodami 4 uždavinio funkciją iš masyvo ištrinkite pirminius skaičius.
*/
echo '<h3>6............................................................................................</h3>';
$array = [];
for ($i = 0; $i < 100; $i++) {
    array_push($array, rand(333, 777));
}

foreach ($array as $key => $item) {
    if (!divisionRemainders($item)) {
        unset($array[$key]);
    }
}

echo 'ištrinkite pirminius skaičius: <br><pre>';
print_r($array);
echo '</pre>';


/*
7.Sugeneruokite atsitiktinio (nuo 10 iki 20) ilgio masyvą, kurio visi, išskyrus paskutinį, 
elementai yra atsitiktiniai skaičiai nuo 0 iki 10, o paskutinis masyvas, 
kuris generuojamas pagal tokią pat salygą kaip ir pirmasis masyvas.
Viską pakartokite atsitiktinį nuo 10 iki 30  kiekį kartų. 
Paskutinio masyvo paskutinis elementas yra lygus 0;
*/
echo '<h3>7............................................................................................</h3>';
$array = [];
$rand = rand(10, 20);
for ($i = 0; $i < $rand; $i++) {
    $array[$i] = [];
    $rand2 = rand(10, 30);
    for ($u = 0; $u < $rand2; $u++) {
        if ($i == $rand - 1 && $u == $rand2 - 1) {
            array_push($array[$i], 0);
        } elseif ($u == $rand2 - 1) {
            array_push($array[$i], $array[$i][0]);
        } else {
            array_push($array[$i], rand(0, 10));
        }
    }
}

echo 'Pirmas ir paskutinis vienodi, pats paskutiniausias 0: <br><pre>';
print_r($array);
echo '</pre>';


/*
8.Suskaičiuokite septinto uždavinio elementų, kurie nėra masyvai, sumą.
*/
echo '<h3>8............................................................................................</h3>';
// ????????????????????????????????????????????????????????????????????
$result = 0;
foreach ($array as $item) {
    $result += array_sum($item);
}

echo "Suma: $result";

/*
9.Sugeneruokite masyvą iš trijų elementų, kurie yra atsitiktiniai skaičiai nuo 1 iki 33. 
Jeigu tarp trijų paskutinių elementų yra nors vienas ne pirminis skaičius, 
prie masyvo pridėkite dar vieną elementą- atsitiktinį skaičių nuo 1 iki 33. 
Vėl patikrinkite pradinę sąlygą ir jeigu reikia pridėkite dar vieną elementą. 
Kartokite, kol sąlyga nereikalaus pridėti elemento. 
*/
echo '<h3>9............................................................................................</h3>';
$array = [];
for ($i = 0; $i < 3; $i++) {
    array_push($array, rand(1, 33));
}
while (
    divisionRemainders($array[count($array) - 1]) ||
    divisionRemainders($array[count($array) - 2]) ||
    divisionRemainders($array[count($array) - 3])
) {
    array_push($array, rand(1, 33));
}

echo 'Pridedam i masyva 1-33 ir kartojam kol paskutinia trys tik pirminiai sk.: <br><pre>';
print_r($array);
echo '</pre>';


/*
10.Sugeneruokite masyvą iš 10 elementų, kurie yra masyvai iš 10 elementų, kurie yra atsitiktiniai skaičiai nuo 1 iki 100. 
Jeigu tokio masyvo pirminių skaičių vidurkis mažesnis už 70, suraskite masyve mažiausią skaičių (nebūtinai pirminį) 
ir prie jo pridėkite 3. 
Vėl paskaičiuokite masyvo pirminių skaičių vidurkį ir jeigu mažesnis nei 70 viską kartokite. 
*/
echo '<h3>10............................................................................................</h3>';
$array = [];
for ($i = 0; $i < 10; $i++) {
    for ($u = 0; $u < 10; $u++) {
        $array[$i][$u] = rand(1, 100);
    }
}
echo '<pre>';
print_r($array);
echo '</pre>';
//
function averageArrayRemainds($arr)
{
    $sum = 0;
    $count = 0;
    foreach ($arr as $item) {
        if (!divisionRemainders($item)) {
            $sum += $item;
            $count++;
        }
    }
    if ($count < 1) {
        return 0;
    }
    return ($sum / $count);
}

foreach ($array as $key => $item) {
    while (true) {
        if (averageArrayRemainds($array[$key]) > 70) {
            break;
        }
        $array[$key][array_search(min($array[$key]), $array[$key])] += 3;
    }
}

echo 'Kartot kol pirminiu sk vidurkis bus didesnis uz 70:<br><pre>';
print_r($array);
echo '</pre>';

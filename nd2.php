<h2>Strings</h2>
<h3>Uzduotis 1</h3>

<?php

$actorName1 = 'Jim Carrey';
$actorName2 = 'Joaquin Phoenix';

echo strlen($actorName1);
echo '<br>';
echo strlen($actorName2);
echo '<br>';

if (strlen($actorName1) < strlen($actorName2)) {
    echo strlen($actorName1);
} else {
    echo strlen($actorName2);
}

?>

<h3>Uzduotis 2</h3>

<?php

$actorName1 = 'Jim Carrey';
$actorName2 = 'Joaquin Phoenix';

$pieces = explode(" ", $actorName1);
$pieces[0] = strtoupper($pieces[0]);
$pieces[1] = strtolower($pieces[1]);
$imp = implode(" ", $pieces);

echo $imp;

?>

<h3>Uzduotis 3</h3>

<?php

$actorName1 = 'Jim Carrey';
$actorName2 = 'Joaquin Phoenix';

$words = explode(" ", $actorName1);
$firstLetters = "";

foreach ($words as $w) {
    $firstLetters .= $w[0];
}

echo $firstLetters;

// $trecias = $acronym;

?>

<h3>Uzduotis 4</h3>

<?php

$actorName1 = 'Jim Carrey';
$actorName2 = 'Joaquin Phoenix';

$temp = explode(' ', $actorName1);

$newName = '';
foreach ($temp as $temp) {
    $newName .= substr($temp, 0, -3);
}
// $name = substr($newName, 0, -1);

echo $newName;

?>

<h3>Uzduotis 5</h3>

<?php

$american = 'An American in Paris';

// $replaced = str_replace($american, "", '*n *meric*n in P*ris');
// $replaced2 = preg_replace('/A/', '*', $american);
$replaced2 = str_replace(str_split('Aa'), '*', $american); // teisingas

echo $replaced2;

?>

<h3>Uzduotis 6</h3>

<?php

$american = 'An American in Paris';

$resultA = substr_count($american, "A");
$resulta = substr_count($american, "a");

echo "Didziuju A raidziu: $resultA";
echo "<br>";
echo "Didziuju A raidziu: $resulta";

?>

<h3>Uzduotis 7</h3>

<?php

$american = 'An American in Paris';
$breakfast = "Breakfast at Tiffany's";
$space = "2001: A Space Odyssey";
$wonderful = "It's a Wonderful Life";

$replaced2 = str_replace(str_split('AaEeIiOoUu'), '', $american);
$replaced3 = str_replace(str_split('AaEeIiOoUu'), '', $breakfast);
$replaced4 = str_replace(str_split('AaEeIiOoUu'), '', $space);
$replaced5 = str_replace(str_split('AaEeIiOoUu'), '', $wonderful);

echo $replaced2;
echo '<br>';
echo $replaced3;
echo '<br>';
echo $replaced4;
echo '<br>';
echo $replaced5;

?>

<h3>Uzduotis 8</h3>

<?php

$randomNr = rand(1, 9);
$starWars = 'Star Wars: Episode ' . str_repeat(' ', rand(0, 5)) . $randomNr . ' - A New Hope';

echo $starWars;
echo '<br>';
echo $randomNr;

?>

<h3>Uzduotis 9</h3>

<?php

$movieName = "Don't Be a Menace to South Central While Drinking Your Juice in the Hood";
$movieNameLt = "Tik nereikia gąsdinti Pietų Centro, geriant sultis pas save kvartale";

$ex = explode(' ', $movieNameLt);
$res = '';
foreach ($ex as $txt) {
    if (strlen($txt) < 6) {
        $res .= $txt . ' ';
    }
}
echo $res;

?>

<h3>Uzduotis 10</h3>

<?php

echo substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 3)), 0, 3);

echo $randomRaides;

?>

<h3>Uzduotis 11</h3>

<?php

$movieName = "Don't Be a Menace to South Central While Drinking Your Juice in the Hood";

function randw($length = 20)
{
    return substr(str_shuffle("Don't Be a Menace to South Central While Drinking Your Juice in the Hood"), 0, $length);
}

print randw();

?>
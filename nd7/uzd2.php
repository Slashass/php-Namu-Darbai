<h2>WEB mechanika</h2>
<p>Uztuotis 2</p>

<?php
/*
2.Sukurti puslapį panašų į 1 uždavinį, tiktai antro linko su perduodamu kintamuoju nedarykite, 
o vietoj to padarykite, URL eilutėje ranka įvedus GET kintamąjį color su RGB spalvos kodu 
(pvz color=ff1234) puslapio fono spalva pasidarytų tokios spalvos.
*/
echo '<style>html{background:black;}</style>';
if (isset($_GET['color'])) {
    echo '<style>html{background:#' . $_GET['color'] . ';}</style>';
}
?>
<a href='?'>Nuoroda i save</a><br>
Pvz. http://localhost/1stlesson/folder/nd7/u2.php?color=1bbd1b
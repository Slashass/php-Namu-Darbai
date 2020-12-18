<h2>WEB mechanika</h2>
<p>Uztuotis 3</p>

<?php
/*
3.Perdarykite 2 uždavinį taip, kad spalvą būtų galimą įrašyti į laukelį ir ją išsiųsti mygtuku GET metodu formoje.
*/
echo '<style>html{background:black;}</style>';
if (isset($_GET['color'])) {
    echo '<style>html{background:#' . $_GET['color'] . ';}</style>';
}
?>
<a href='?'>Nuoroda i save</a><br>

<form method='get'>
    <input type='text' name='color'>
    <input type='submit' value='Pakeisti spalva'>
</form>
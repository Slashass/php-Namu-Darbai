<a href="http://localhost/bla/basic/bebras.php?p=1">1</a>
<a href="?p=2">2</a>
<a href="">????</a>
<br>
<a href="http://localhost/bla/basic/bebras/1">1</a>
<a href="http://localhost/bla/basic/bebras/2">2</a>




<?php
// _d($_SERVER['REQUEST_URI']);



$page = preg_replace('/[^\d]/', '', $_SERVER['REQUEST_URI']);

// _d($page);

/*
$_GET get metodu perduodami kintamieji 
$_POST post metodu perduodami kintamieji
$_COOKIE kukių masyvas, jame yra visi iš naršyklės atėję kukiai
$_REQUEST trijų masyvų suma <--- nenaudoti
// http://localhost/bla/basic/bebras/1
.htaccess
*/

?>

<?php //if (!isset($_GET['p']) || 1 == $_GET['p']): 
?>
<?php if (!$page || 1 == $page) : ?>

    <h1>PUSLAPIS 1</h1>

    <?php //elseif (isset($_GET['p']) && 2 == $_GET['p']): 
    ?>
<?php elseif (2 == $page) : ?>

    <h1>PUSLAPIS 2</h1>

<?php else : ?>

    <h1>PUSLAPIO tokio nėra</h1>

<?php endif ?>
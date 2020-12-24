<?php
session_start();

if (!isset($_SESSION['logged']) || 1 != $_SESSION['logged']) {
    header('Location: http://localhost/bla/login/login.php');
    die;
}


?>
<a href="login.php?logout">ATSIJUNGTI</a>
<h1>SLAPTAS PEIDŽAS</h1>
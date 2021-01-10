<form action="" method="get">

    <input type="text" name="x" value="<?= $_POST['x'] ?? '' ?>"><br>
    <input type="text" name="y" value="<?= $_POST['y'] ?? '' ?>"><br>

    <button type="submit">SUMUOTI</button>

</form>

<?php

if (!empty($_GET)) {
    $rez = (float)($_GET['x'] ?? 0) + (float)($_GET['y'] ?? 0);

    // header('location: http://localhost/...');
    // die;
}


//
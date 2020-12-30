<?php
// _d($_GET, 'GET MASYVAS');
// _d($_POST, 'POST MASYVAS');
// _d($_SERVER, 'SEVER MASYVAS');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Location: http://localhost/bla/basic/paieska.php');
    exit;
}

?>
<form action="" method="post">

    <input type="text" name="q">
    <br>
    <input type="checkbox" name="chekboksas1" value="OK">
    <input type="checkbox" name="chekboksas2" value="NOT OK" checked>
    <br>
    <textarea name="ilgas_tekstas" cols="10" rows="3">
</textarea>

    <br>
    <input type="radio" name="radijo1" value="1">
    <input type="radio" name="radijo2" value="2" checked>
    <input type="radio" name="radijo1" value="3">

    <br>
    <input type="radio" name="radijo2" value="5">
    <input type="radio" name="radijo1" value="7">
    <input type="radio" name="radijo2" value="99">

    <br>
    <select name="selektas">
        <option value="0">nieko nepasirinkta</option>
        <option value="o1">optionas nr 1</option>
        <option value="o2" selected>optionas nr 2</option>
    </select>
    <br><br>
    <input type="file" name="failas">

    <br><br>
    <button type="submit">VARYK!</button>

</form>

<?php if (isset($_GET['q'])) : ?>

    <p>pagal ieškomą frazę <strong><?= $_GET['q'] ?></strong> nieko nerasta.</p>

<?php endif ?>

<?php
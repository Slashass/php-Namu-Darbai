<?php
setcookie('Kukis', 'Ežiukas rūke');
setcookie('Kukis22', '--------------------------------------------');
//
setcookie('Filter1', 'green');
setcookie('Filter2', 'long tail');
setcookie('Filter5', 'black');
// setcookie('logged', 0);
//


setcookie('filters_id', '3857985986548647523594623586');

$gigantiskasMasyvas['3857985986548647523594623586'] =

    [
        'Filter1' => 'green',
        'Filter2' => 'long tail',
        'logged' => 0,
        'Filter5' => 'black'
    ];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document <?= rand(100, 999) ?></title>
    <link rel="stylesheet" href="http://localhost/bla/basic/style.php">
    <script src="http://localhost/bla/basic/app.js" defer></script>
</head>

<body>
    <h1 style="color:red;">Sveiki atvykę į Mišką</h1>
    <h2>Didelis miškas</h2>
    <?php foreach (range(1, 10) as $_) : ?>
        <p>Labas</p>
    <?php endforeach ?>
    <img src="https://www.abc.net.au/reslib/200904/r358314_1650546.jpg">
</body>

</html>
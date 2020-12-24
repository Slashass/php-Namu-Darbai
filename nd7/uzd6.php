<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $backgroundcolor = 'green';
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $backgroundcolor = 'yellow';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ND 6</title>
    <style>
        body {
            background: <?= $backgroundcolor ?>;
        }
    </style>
</head>

<body>

</body>

</html>
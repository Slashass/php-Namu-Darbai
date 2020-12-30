<?php
session_start();
// _d($_POST, 'POST');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['answer'])) {
        $_SESSION['answ'] = 'Šaunuolis, bet pabandyk pasirinkti atsakymą prieš spausdamas';
        $_SESSION['status'] = 0;
    } elseif ($_SESSION['correct'] != $_POST['answer']) {
        $_SESSION['answ'] = 'Labai gerai, bet pabandyk dar kartą pagalvoti';
        $_SESSION['status'] = 0;
    } else {
        $_SESSION['answ'] = 'Teisingai';
        $_SESSION['status'] = 1;
    }
    header('Location: http://localhost/1stlesson/folder/test/');
    exit;
}

// Naujas arba atsakyta teisingai
if (!isset($_SESSION['status']) || 1 == $_SESSION['status']) {
    $lib = [
        ['img' => 'rudolf1.jpg', 'correct' => 1],
        ['img' => 'rudolf2.jpg', 'correct' => 4],
        ['img' => 'rudolf3.jpg', 'correct' => 3]
    ];
    shuffle($lib);
    $_SESSION['correct'] = $lib[0]['correct'];
    $_SESSION['img'] = $lib[0]['img'];
    unset($_SESSION['status']);
}
// Atsakymas neteisingas - kartojam
else {
    $lib[0]['img'] = $_SESSION['img'];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST 1</title>
    <style>
        .container {
            display: flex;
            justify-content: center;
        }

        label {
            width: 200px;
            font-size: 40px;
            display: inline-block;
        }

        button {
            font-size: 40px;
            padding: 12px;
            margin-top: 20px;
        }

        img {
            max-height: 400px;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <img src="<?= $lib[0]['img'] ?>" alt="Rudolf">
        <form action="" method="post">
            <?php if (isset($_SESSION['answ'])) : ?>
                <h2>
                    <?= $_SESSION['answ'] ?>
                </h2>
                <?php unset($_SESSION['answ']) ?>
            <?php endif ?>
            <h2>Vaikai, atspėkite kas tai yra?</h2>
            <div class="answer">
                <label>Barsukas</label>
                <input type="radio" name="answer" value="1">
            </div>
            <div class="answer">
                <label>Bebras</label>
                <input type="radio" name="answer" value="2">
            </div>
            <div class="answer">
                <label>Briedis</label>
                <input type="radio" name="answer" value="3">
            </div>
            <div class="answer">
                <label>Bembis</label>
                <input type="radio" name="answer" value="4">
            </div>
            <button type="submit">Aš žinau!</button>
        </form>
    </div>
</body>

</html>
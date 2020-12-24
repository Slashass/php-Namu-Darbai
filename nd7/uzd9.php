<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ND 9</title>
    <style>
        body {
            background: black;
        }
    </style>
</head>

<body>
    <form action="" method="post">

        <?php $countAll = rand(3, 10) ?>

        <?php foreach (range('A', 'K') as $key => $checkbox) : ?>
            <?php if ($key + 1 == $countAll) break; ?>
            <input type="checkbox" name="box[]"><label><?= $checkbox ?></label>
        <?php endforeach ?>

        <button type="submit">GO</button>
    </form>

    <?php print_r($_POST) ?>

</body>

</html>
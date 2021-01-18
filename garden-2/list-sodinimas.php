<?php foreach ($storage->getAll() as $darzove) : ?>
    <?php if ($darzove->name == 'Agurkas') : ?>
        <div class="items">
            <img src="img/cuc-<?= $darzove->imgPath ?>.jpg" alt="Agurko nuotrauka">
            <h2>Agurkas Nr. :<?= $darzove->id ?></h2>
            <h3>Agurku: <?= $darzove->count ?></h3>
            <p class="kaina">Kaina: <?= round($darzove->price * $rate, 5) ?> USD</p>
            <button class="isrovimoMyg" type="button" name="israuti" value="<?= $darzove->id ?>">ISRAUTI</button>
        </div>
    <?php elseif ($darzove->name == 'Paprika') : ?>
        <div class="items">
            <img src="img/paprika-<?= $darzove->imgPath ?>.jpg" alt="Paprikos nuotrauka">
            <h2>Paprikos Nr. :<?= $darzove->id ?></h2>
            <h3>Papriku: <?= $darzove->count ?></h3>
            <p class="kaina">Kaina: <?= round($darzove->price * $rate, 5) ?> USD</p>
            <button class="isrovimoMyg" type="button" name="israuti" value="<?= $darzove->id ?>">ISRAUTI</button>
        </div>
    <?php endif ?>
<?php endforeach ?>
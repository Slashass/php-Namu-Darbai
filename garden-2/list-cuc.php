<?php foreach ($storage->getAll() as $darzove) : ?>
    <div class="items">
        <img src="img/cuc-<?= $darzove->imgPath ?>.jpg" alt="Agurko nuotrauka">
        <h2>Agurkas Nr. :<?= $darzove->id ?></h2>
        <h3>Agurku: <?= $darzove->count ?></h3>
        <button class="isrovimoMyg" type="button" name="israuti" value="<?= $darzove->id ?>">ISRAUTI</button>
    </div>
<?php endforeach ?>
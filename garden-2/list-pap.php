<?php foreach ($storage->getAll() as $darzove) : ?>
    <div class="items">
        <img src="img/paprika-<?= $darzove->imgPath ?>.jpg" alt="Paprikos nuotrauka">
        <h2>Paprikos Nr. :<?= $darzove->id ?></h2>
        <h3>Papriku: <?= $darzove->count ?></h3>
        <button class="isrovimoMyg" type="button" name="israuti" value="<?= $darzove->id ?>">ISRAUTI</button>
    </div>
<?php endforeach ?>
<?php foreach ($storage->getAll() as $darzove) : ?>
    <?php if ($darzove->name == 'Agurkas') : ?>
        <div class="items">
            <img src="./img/cuc-<?= $darzove->imgPath ?>.jpg" alt="Agurko nuotrauka">
            <?php if ($darzove->count == 0) : ?>
                <h2 style="display: inline;">Agurkas Nr. :<?= $darzove->id ?></h2>
                <p>Kiekis: <span><?= $darzove->count ?></span></p>
                <p>Nėra ko skinti.</p>
            <?php else : ?>
                <h2>Agurkas Nr. :<?= $darzove->id ?></h2>
                <p class="galimaSkinti">Galima skinti: <?= $darzove->count ?></p>
                <input class="kiek" type="number" name="kiek" id="cucumber">
                <button class="skinti" type="button" name="skinti" value="<?= $darzove->id ?>" id="cucumber">Skinti</button>
                <button class="skinti-visus" type="button" name="skinti-visus" value="<?= $darzove->id ?>">Skinti visus</button>
            <?php endif ?>
        </div>
    <?php elseif ($darzove->name == 'Paprika') : ?>
        <div class="items">
            <img src="./img/paprika-<?= $darzove->imgPath ?>.jpg" alt="Paprikos nuotrauka">
            <?php if ($darzove->count == 0) : ?>
                <h2 style="display: inline;">Paprikos Nr. :<?= $darzove->id ?></h2>
                <p>Kiekis: <span><?= $darzove->count ?></span></p>
                <p>Nėra ko skinti.</p>
            <?php else : ?>
                <h2>Paprikos Nr. :<?= $darzove->id ?></h2>
                <p class="galimaSkinti">Galima skinti: <?= $darzove->count ?></p>
                <input class="kiek" type="number" name="kiek" id="peper">
                <button class="skinti" type="button" name="skinti" value="<?= $darzove->id ?>" id="peper">Skinti</button>
                <button class="skinti-visus" type="button" name="skinti-visus" value="<?= $darzove->id ?>">Skinti visus</button>
            <?php endif ?>
        </div>
    <?php endif ?>
<?php endforeach ?>
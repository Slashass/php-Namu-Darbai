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
                <input class="kiek" type="number" name="kiek">
                <button class="skinti" type="submit" name="skinti" value="<?= $darzove->id ?>">Skinti</button>
                <button class="skinti-visus" type="submit" name="skinti-visus" value="<?= $darzove->id ?>">Skinti visus</button>
            <?php endif ?>
        </div>
    <?php else : ?>
        <div class="items">
            <img src="./img/paprika-<?= $darzove->imgPath ?>.jpg" alt="Paprikos nuotrauka">
            <?php if ($darzove->count == 0) : ?>
                <h2 style="display: inline;">Paprikos Nr. :<?= $darzove->id ?></h2>
                <p>Kiekis: <span><?= $darzove->count ?></span></p>
                <p>Nėra ko skinti.</p>
            <?php else : ?>
                <h2>Paprikos Nr. :<?= $darzove->id ?></h2>
                <p class="galimaSkinti">Galima skinti: <?= $darzove->count ?></p>
                <input class="kiek" type="number" name="kiek">
                <button class="skinti" type="submit" name="skinti" value="<?= $darzove->id ?>">Skinti</button>
                <button class="skinti-visus" type="submit" name="skinti-visus" value="<?= $darzove->id ?>">Skinti visus</button>
            <?php endif ?>
        </div>
    <?php endif ?>
<?php endforeach ?>
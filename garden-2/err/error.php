<?php if (isset($error)) : ?>
    <?php if (1 == $error) : ?>
        <h2 style="color:red;">Neigiamas darzoviu skaicius</h2>
    <?php endif ?>
    <?php if (2 == $error) : ?>
        <h2 style="color:red;">Per daug norite nuskinti, pone</h2>
    <?php endif ?>
    <?php if (3 == $error) : ?>
        <h2 style="color:red;">Per daug sodinate, pone</h2>
    <?php endif ?>
    <?php unset($error) ?>
<?php endif ?>
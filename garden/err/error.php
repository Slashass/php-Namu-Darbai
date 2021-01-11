<?php if (isset($_SESSION['err'])) : ?>
    <?php if (1 == $_SESSION['err']) : ?>
        <h2 style="color:red;">Neigiamas agurkas</h2>
    <?php endif ?>
    <?php if (2 == $_SESSION['err']) : ?>
        <h2 style="color:red;">Per daug sodinate, pone</h2>
    <?php endif ?>
    <?php if (3 == $_SESSION['err']) : ?>
        <h2 style="color:red;">Per daug norite nuskinti, pone</h2>
    <?php endif ?>
    <?php if (4 == $_SESSION['err']) : ?>
        <h2 style="color:red;">Tokios dalies negalima nuskinti, pone</h2>
    <?php endif ?>
    <?php unset($_SESSION['err']) ?>
<?php endif ?>
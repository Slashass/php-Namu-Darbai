<?php

echo '<pre>';

print_r($_GET);

if (!isset($_GET['page']) || 1 == $_GET['page']) {
    echo 'PAGE1';
} elseif (2 == $_GET['page']) {
    echo 'PAGE2';
} elseif (3 == $_GET['page']) {
    echo 'PAGE3';
}

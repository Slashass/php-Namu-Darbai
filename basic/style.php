<?php
header("Content-Type: text/css");
?>
p {
color: #<?= dechex(rand(1, 255)) . dechex(rand(1, 255)) . dechex(rand(1, 255)) ?>;
}
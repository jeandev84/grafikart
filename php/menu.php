<?php
require_once 'functions.php';

$title = "Notre menu";

/*
les (2) lines revient a utiliser en une ligne la fonction file(__DIR__.DIRECTORY_SEPARATOR. 'data'. DIRECTORY_SEPARATOR. 'menu.tsv');
$menu  = file_get_contents(__DIR__.DIRECTORY_SEPARATOR. 'data'. DIRECTORY_SEPARATOR. 'menu.tsv');
$lines = explode(PHP_EOL, $menu);
*/

// TSV : TABULATION SEPARATE VALUE
$lines = file(__DIR__.DIRECTORY_SEPARATOR. 'data'. DIRECTORY_SEPARATOR. 'menu.tsv');

foreach ($lines as $k => $line) {
    $lines[$k] = explode("\t", trim($line));
}


require 'elements/header.php';
?>

<h1>Menu</h1>

<?php foreach ($lines as $line): ?>
    <?php if (count($line) === 1): ?>
        <h2><?= $line[0] ?></h2>
    <?php else: ?>
        <p>
            <strong><?= $line[0] ?></strong><br>
            <?= $line[1] ?>
        </p>
    <?php endif; ?>

<?php endforeach; ?>

<?php // dump($lines); ?>

<?php require 'elements/footer.php'; ?>
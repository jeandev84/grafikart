<?php
$title = "Nous contacter";
require_once 'config.php';
require_once 'functions.php';

// Timezone date('e'); par default UTC
// date_default_timezone_set('Europe/Paris');
date_default_timezone_set('Europe/Moscow');


// Recuperer l' heure d' aujourd' hui $heure
$heure = (int) date('G');


// Recuperer les creneaux d' aujourd' hui  $creneaux
$creneaux = CRENEAUX[date('N') - 1];

/*
dump($heure);
dump($creneaux);
*/


// Recuperer l' etat d' ouverture du magasin
$ouvert = in_creneaux($heure, $creneaux);
$color = 'green';

if (! $ouvert) {
  $color = 'red';
}

require 'header.php';
?>


<div class="row">
    <div class="col-md-8">

        <h2>Nous contacter</h2>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi earum eos facilis harum in laboriosam, magni sed sit tempore veniam.</p>

    </div>
    <div class="col-md-4">
        <h2>Horaire d' ouvertures</h2>
        <!--
         - Lundi : De 9h a 12h et de 14h a 19h
         - Mardi : De 9h a 12h et de 14h a 19h
         ...
         - Dimanche : Ferme
         -->
        <? // = date('l d F Y'); ?>
        <? // = date('N'); ?> <!-- return le nombre de la semaine -->

        <?php if ($ouvert): ?>
            <div class="alert alert-success">
                Le magasin est ouvert
            </div>
        <?php else: ?>
            <div class="alert alert-danger">
                Le magasin est ferme
            </div>
        <?php endif; ?>
        <ul>
            <?php foreach (JOURS as $k => $jour): ?>
                  <li <?php if ($k + 1 === (int) date('N')): ?> style="color: <?= $color ?>;" <?php endif; ?>>
                      <strong><?= $jour ?></strong>
                      <?=  creneauxHtml(CRENEAUX[$k]) ?>
                  </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<?php require 'footer.php'; ?>

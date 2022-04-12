<?php

/*
 Elements compose de [name => price]
*/

$currency = '€';


// Checkbox
$parfums = [
   'Fraise'   => 4,
   'Chocolat' => 5,
   'Vanille'  => 3
];


// Radio
$cornets = [
   'Pot'    => 2,
   'Cornet' => 3
];


// Checkbox
$supplements = [
   'Pepite de chocolat' => 1,
   'Chantilly' => 0.5
];


$title = "Composer votre glace";

require 'header.php';

?>

<h1>Composer votre glace</h1>
<form action="/game.php" method="GET">
    <!-- List parfums -->
    <?php foreach ($parfums as $name => $price): ?>
        <div class="checkbox">
            <label for="fraise">
                <input type="checkbox" id="fraise" name="parfum[]" value="<?= $name ?>">
                <?= $name ?> - <?= $price ?> €
            </label>
        </div>
    <?php endforeach; ?>

    <button type="submit" class="btn btn-primary">Composer ma glace</button>
</form>

<?php debug(); ?>

<!-- Maket Formulaire
<h1>Composer votre glace</h1>
<form action="/game.php" method="GET">
    <div class="form-group">
        <input type="checkbox" name="parfum[]" value="Fraise"> Fraise <br>
        <input type="checkbox" name="parfum[]" value="Vanille"> Vanille <br>
        <input type="checkbox" name="parfum[]" value="Chocolat"> Chocolat <br>
    </div>
    <button type="submit" class="btn btn-primary">Deviner</button>
</form>
-->

<?php require 'footer.php'; ?>


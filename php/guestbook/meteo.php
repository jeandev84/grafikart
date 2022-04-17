<?php
require_once 'class/OpenWeather.php';

$celsius = '°C';

$weather = new OpenWeather('ca8bd7ffc58648c13b64915a4ae78f09');
$forecast = $weather->getForecast('Montpellier,fr'); // recupere les info de meteos les 16 prochains jours

require 'elements/header.php';

?>


<div class="container">
    <ul>
       <?php foreach ($forecast as $day): ?>
         <!--  <li>03/02/2018 Ciel degage 20 °C</li>-->
          <li><?= $day['date']->format('d/m/Y') ?> <?= $day['description'] ?> <?= $day['temp'] ?> °C</li>
       <?php endforeach; ?>
    </ul>
</div>

<?php

require 'elements/footer.php';

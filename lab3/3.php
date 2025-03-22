<?php

$numLanguages = 4;
$months = 11;

$daysPerMonth = 16;
$days = $months * $daysPerMonth;

$daysPerLanguage = $days / $numLanguages;

echo $daysPerLanguage;

?>
<?php
$duration = $_POST['duration'];
$task = $_POST['task'];
$difficulte = $_POST['radio'];


$day = date("l");
$nday = date("n");
$fmt = datefmt_create(
    'fr_FR',
    IntlDateFormatter::FULL,
    IntlDateFormatter::FULL,
    'Europe/Paris',
    IntlDateFormatter::GREGORIAN,
    'EEEE dd MMMM yyyy'
);
echo datefmt_format($fmt, time());
?>

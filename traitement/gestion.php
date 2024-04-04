<?php
$duration = $_POST['duration'];
$task = $_POST['task'];
$difficulte = $_POST['radio'];


$day = date("l");
$nday = date("n");
$month = datefmt_create(
    'fr_FR',
    IntlDateFormatter::FULL,
    IntlDateFormatter::FULL,
    'Europe/Paris',
    IntlDateFormatter::GREGORIAN,
    'dd/MM/yyyy'
);
echo IntlDateFormatter::getErrorMessage();
echo $month->format(time()); // Utilisation de la méthode format() pour afficher la date formatée
?>
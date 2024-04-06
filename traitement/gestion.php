<?php
$duration = $_POST['duration'];
$task = $_POST['task'];
$difficulte = $_POST['radio'];
$date = $_POST['date'];


$day = date("l");
$nday = date("n");
$fmt = datefmt_create(
    'fr_FR',
    IntlDateFormatter::FULL,
    IntlDateFormatter::FULL,
    'Europe/Paris',
    IntlDateFormatter::GREGORIAN,
    'HH:mm:ss EEEE dd MMMM yyyy'
);
// header("Refresh:1");
$date=datefmt_format($fmt, time());
$date_encode = urlencode($date);
header("Location: ../index.php?fmt=$date_encode");
exit;
?>

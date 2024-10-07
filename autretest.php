<?php
if (isset($_POST['start']) && isset($_POST['end'])) {
    $start = $_POST['start'];
    $end = $_POST['end'];



    echo "Données reçues : Start = " . $start . ", End = " . $end;
} else {
    echo "Aucune donnée reçue.";
}
?>

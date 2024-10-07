<?php
require 'task.php';
require 'login.php';

$douche = new Task(20, 10, $db);
$douche->save();
var_dump($douche->energie);
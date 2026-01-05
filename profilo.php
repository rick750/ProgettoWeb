<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "Unigames - Profilo";
$templateParams["nome"] = "profilo-menu.php";

$templateParams["aside"] = "lista-giochiRandom.php";
$templateParams["giochiRandomFunc"] = $dbh->getGiochiRandom(3);


require 'template/base.php';
?>
<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "Unigames - Libreria Giochi";
$templateParams["selezionaFiltro"] = false;
$templateParams["nome"] = "lista-giochi.php";
$templateParams["libreriaGiochiFunc"] = $dbh -> getLibreriaGiochi();
$templateParams["giochiRandom"] = "lista-giochiRandom.php";
$templateParams["giochiRandomFunc"] = $dbh->getGiochiRandom(2);
$templateParams["filtri"] = $dbh->getTags();

require 'template/base.php';
?>
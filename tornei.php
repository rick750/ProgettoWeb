<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Unigames - Tornei";
$templateParams["nome"] = "lista-tornei.php";
$templateParams["selezionaFiltro"] = false;
$templateParams["giochiRandom"] = "lista-giochiRandom.php";
$templateParams["giochiRandomFunc"] = $dbh->getGiochiRandom(2);
//Tornei Template
$templateParams["filtri"] = [["id" => "iscritto", "nome" => "Iscritto"]];
$templateParams["tornei"] = $dbh->getTornei();
$templateParams["tornei_iscritto"] = $dbh->getTorneiIscritto();
$templateParams["tornei_noniscritto"] = $dbh->getTorneiNonIscritto();

require 'template/base.php';
?>
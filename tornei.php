<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Unigames - Home";
$templateParams["nome"] = "lista-tornei.php";
//Tornei Template
$templateParams["filtri"] = [["id" => "iscritto", "nome" => "Iscritto"]];
$templateParams["tornei"] = $dbh->getTornei();
$templateParams["tornei_iscritto"] = $dbh->getTorneiIscritto();
$templateParams["tornei_noniscritto"] = $dbh->getTorneiNonIscritto();

require 'template/base.php';
?>
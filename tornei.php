<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Unigames - Tornei";
$templateParams["nome"] = "lista-tornei.php";
$templateParams["aside"] = "lista-giochiRandom.php";
$templateParams["giochiRandomFunc"] = $dbh->getGiochiRandom(3);

$templateParams["filtri"] = [
    ["valore" => "iscritto", "nome" => "Iscritto"]
];
$templateParams["selezionaFiltro"] = $_GET["filter"] ?? [];
$filtri = $templateParams["selezionaFiltro"];

$mostraSoloIscritto = in_array("iscritto", $filtri);

if ($mostraSoloIscritto) {
    $templateParams["tornei"] = $dbh->getTorneiIscritto();
} else {
    $templateParams["tornei"] = $dbh->getTornei();
}

require 'template/base.php';
?>
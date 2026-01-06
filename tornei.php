<?php
require_once 'bootstrap.php';

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
    $tornei = $dbh->getTorneiIscritto();
    foreach ($tornei as &$torneo) {
        $torneo["iscritto"] = true;
    }
} else {
    $tornei = $dbh->getTornei();
    $torneiIscritto = $dbh->getTorneiIscritto();
    foreach ($tornei as &$torneo) {
        $torneo["iscritto"] = in_array($torneo, $torneiIscritto);
    }
}
$templateParams["tornei"] = $tornei;

require 'template/base.php';
?>
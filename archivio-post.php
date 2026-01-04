<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "Unigames - Archivio Post";
$templateParams["nome"] = "lista-post.php";
$templateParams["selezionaFiltro"] = [];
$templateParams["aside"] = "lista-giochiRandom.php";
$templateParams["giochiRandomFunc"] = $dbh->getGiochiRandom(2);

$templateParams["filtri"] = [
    ["valore" => "generici", "nome" => "Generici"],
    ["valore" => "recensioni", "nome" => "Recensioni"]
];

$templateParams["selezionaFiltro"] = $_GET["filter"] ?? [];
$filtri = $templateParams["selezionaFiltro"];

$templateParams["post"] = [];
$templateParams["recensioni"] = [];

$mostraGenerici = empty($filtri) || in_array("generici", $filtri);
$mostraRecensioni = empty($filtri) || in_array("recensioni", $filtri);

if ($mostraGenerici) {
    $templateParams["post"] = $dbh->getGenericPosts(-1);
}

if ($mostraRecensioni) {
    $templateParams["recensioni"] = $dbh->getRecensioni(-1);
}
require 'template/base.php';
?>
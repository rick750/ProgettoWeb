<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Unigames - Home";
$templateParams["nome"] = "lista-post.php";
$templateParams["selezionaFiltro"] = [];
$templateParams["aside"] = "lista-giochiRandom.php";
$templateParams["giochiRandomFunc"] = $dbh->getGiochiRandom(3);
//Home Template
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
    $templateParams["post"] = $dbh->getGenericPosts(2);
}

if ($mostraRecensioni) {
    $templateParams["recensioni"] = $dbh->getRecensioni(2);
}

require 'template/base.php';
?>
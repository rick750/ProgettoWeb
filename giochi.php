<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "Unigames - Libreria Giochi";
$templateParams["nome"] = "lista-giochi.php";
$templateParams["libreriaGiochiFunc"] = $dbh -> getLibreriaGiochi();
$templateParams["giochiRandom"] = "lista-giochiRandom.php";
$templateParams["giochiRandomFunc"] = $dbh->getGiochiRandom(2);
$templateParams["filtri"] = array_map(
    fn($t) => [
        "valore" => $t["codiceTag"],
        "nome"   => $t["nome"]
    ],
    $dbh->getTags()
);


$templateParams["selezionaFiltro"] = $_GET["filter"] ?? [];
$templateParams["libreriaGiochiFunc"] =
    $dbh->getLibreriaGiochi($templateParams["selezionaFiltro"]);


require 'template/base.php';
?>
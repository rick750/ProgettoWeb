<?php
require_once 'bootstrap.php';
if (isset($_GET["action"]) && $_GET["action"] === "recensioni" && isset($_GET["id"])) {
    // 1. Recupero ID gioco 
    $idGioco = intval($_GET["id"]);

    // 2. Recupero recensioni dal DB
    $templateParams["nomeGioco"] = $dbh->getNomeGioco($idGioco);
    $templateParams["recensioni"] = $dbh->getRecensioniGioco($idGioco);

    // 3. Carico il template delle recensioni
    $templateParams["aside"] = "recensioni-gioco.php";
}

$templateParams["titolo"] = "Unigames - Libreria Giochi";
$templateParams["nome"] = "lista-giochi.php";
$templateParams["libreriaGiochiFunc"] = $dbh -> getLibreriaGiochi();

$templateParams["filtri"] = array_map(
    fn($t) => [
        "valore" => $t["codiceTag"],
        "nome"   => $t["nome"]
    ],
    $dbh->getTags()
);

$templateParams["selezionaFiltro"] = $_GET["filter"] ?? [];
$templateParams["libreriaGiochiFunc"] = $dbh->getLibreriaGiochi($templateParams["selezionaFiltro"]);
require 'template/base.php';
?>
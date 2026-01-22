<?php
require_once 'bootstrap.php';
if (isset($_GET["action"]) && $_GET["action"] === "recensioni" && isset($_GET["codice"])) {

    $idGioco = intval($_GET["codice"]);

    $templateParams["nomeGioco"] = $dbh->getNomeGioco($idGioco);
    $templateParams["recensioni"] = $dbh->getRecensioniGioco($idGioco);

    $templateParams["aside"] = "recensioni-gioco.php";
}

$templateParams["titolo"] = "Unigames - Libreria Giochi";
$templateParams["nome"] = "lista-giochi.php";
$templateParams["admin"] = $dbh->getAdmin(2);
$templateParams["libreriaGiochiFunc"] = $dbh->getLibreriaGiochi();

$templateParams["filtri"] = array_map(
    fn($t) => [
        "valore" => $t["codiceTag"],
        "nome" => $t["nome"]
    ],
    $dbh->getTags()
);

$templateParams["selezionaFiltro"] = $_GET["filter"] ?? [];
$templateParams["libreriaGiochiFunc"] = $dbh->getLibreriaGiochi($templateParams["selezionaFiltro"]);
require 'template/base.php';
?>
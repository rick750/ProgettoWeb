<?php
require_once 'bootstrap.php';
if (isset($_GET["action"]) && $_GET["action"] === "recensioni" && isset($_GET["codice"])) {
    // 1. Recupero ID gioco 
    $idGioco = intval($_GET["codice"]);

    // 2. Recupero recensioni dal DB
    $templateParams["nomeGioco"] = $dbh->getNomeGioco($idGioco);
    $templateParams["recensioni"] = $dbh->getRecensioniGioco($idGioco);

    // 3. Carico il template delle recensioni
    $templateParams["aside"] = "recensioni-gioco.php";
}
$templateParams["titolo"] = "Unigames - Giochi aggiunti";
$templateParams["nome"] = "lista-giochi.php";
$templateParams["libreriaGiochiFunc"] = $dbh->getAdminGiochi($_SESSION["email"]);

$templateParams["giochiRandomFunc"] = $dbh->getGiochiRandom(3);
$templateParams["indietro"] = "profilo.php";


require 'template/base.php';
?>
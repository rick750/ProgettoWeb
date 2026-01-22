<?php
require_once 'bootstrap.php';
if (!empty($_SESSION["email"])) {
    if (isset($_GET["action"]) && $_GET["action"] === "recensioni" && isset($_GET["codice"])) {
        $idGioco = intval($_GET["codice"]);

        $templateParams["nomeGioco"] = $dbh->getNomeGioco($idGioco);
        $templateParams["recensioni"] = $dbh->getRecensioniGioco($idGioco);

        $templateParams["aside"] = "recensioni-gioco.php";
    }
    $templateParams["titolo"] = "Unigames - Giochi aggiunti";
    $templateParams["nome"] = "lista-giochi.php";
    $templateParams["admin"] = $dbh->getAdmin(2);
    $templateParams["libreriaGiochiFunc"] = $dbh->getAdminGiochi($_SESSION["email"]);

    $templateParams["giochiRandomFunc"] = $dbh->getGiochiRandom(3);
    $templateParams["indietro"] = "profilo.php";


    require 'template/base.php';
}
?>
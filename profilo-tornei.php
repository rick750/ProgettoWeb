<?php
require_once 'bootstrap.php';
if (!empty($_SESSION["email"])) {
    $_SESSION["pagina_precedente"] = $_SERVER["REQUEST_URI"];
    $templateParams["titolo"] = "Unigames - Tornei dell'utente";
    $templateParams["nome"] = "lista-tornei.php";
    $templateParams["admin"] = $dbh->getAdmin(2);
    $templateParams["tornei"] = $dbh->getTorneiCreati($_SESSION["email"]);

    $templateParams["aside"] = "lista-giochiRandom.php";
    $templateParams["giochiRandomFunc"] = $dbh->getGiochiRandom(3);
    $templateParams["indietro"] = "profilo.php";

    require 'template/base.php';
}
?>
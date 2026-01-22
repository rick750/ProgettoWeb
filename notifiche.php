<?php
require_once 'bootstrap.php';
if (!empty($_SESSION["email"])) {
    $templateParams["titolo"] = "Unigames - Notifiche";
    $templateParams["nome"] = "lista-notifiche.php";
    $templateParams["aside"] = "lista-giochiRandom.php";
    $templateParams["admin"] = $dbh->getAdmin(2);
    $templateParams["giochiRandomFunc"] = $dbh->getGiochiRandom(3);
    $templateParams["messaggi_inviati"] = $dbh->getMessaggiInviati();
    $templateParams["messaggi_ricevuti"] = $dbh->getMessaggiRicevuti();

    require 'template/base.php';
}
?>
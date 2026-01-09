<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "Unigames - Notifiche";
$templateParams["nome"] = "lista-notifiche.php";
$templateParams["aside"] = "lista-giochiRandom.php";
$templateParams["giochiRandomFunc"] = $dbh->getGiochiRandom(3);
$templateParams["messaggi_inviati"] = $dbh->getMessaggiInviati();
$templateParams["messaggi_ricevuti"] = $dbh->getMessaggiRicevuti();

require 'template/base.php';
?>
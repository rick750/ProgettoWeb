<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "Unigames - Tornei dell'utente";
$templateParams["nome"] = "lista-tornei.php";
$templateParams["tornei"] = $dbh->getUserTornei($_SESSION["email"]);

$templateParams["aside"] = "lista-giochiRandom.php";
$templateParams["giochiRandomFunc"] = $dbh->getGiochiRandom(3);
$templateParams["indietro"] = "profilo.php";


require 'template/base.php';
?>
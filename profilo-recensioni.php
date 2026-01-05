<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "Unigames - Recensioni dell'utente";
$templateParams["nome"] = "lista-recensioni.php";
$templateParams["recensioni"] = $dbh->getUserRecensioni($_SESSION["email"]);

$templateParams["aside"] = "lista-giochiRandom.php";
$templateParams["giochiRandomFunc"] = $dbh->getGiochiRandom(3);
$templateParams["indietro"] = "profilo.php";


require 'template/base.php';
?>
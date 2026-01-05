<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "Unigames - Giochi aggiunti";
$templateParams["nome"] = "lista-giochi.php";
$templateParams["libreriaGiochiFunc"] = $dbh->getAdminGiochi($_SESSION["email"]);

$templateParams["aside"] = "lista-giochiRandom.php";
$templateParams["giochiRandomFunc"] = $dbh->getGiochiRandom(3);
$templateParams["indietro"] = "profilo.php";


require 'template/base.php';
?>
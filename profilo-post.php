<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "Unigames - Post dell'utente";
$templateParams["nome"] = "lista-post.php";
$templateParams["post"] = $dbh->getUserGenerici();

$templateParams["aside"] = "lista-giochiRandom.php";
$templateParams["giochiRandomFunc"] = $dbh->getGiochiRandom(3);
$templateParams["indietro"] = "profilo.php";

require 'template/base.php';
?>
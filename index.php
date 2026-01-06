<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "Unigames - Home";
$templateParams["nome"] = "lista-post.php";
$templateParams["selezionaFiltro"] = [];
$templateParams["aside"] = "lista-giochiRandom.php";
$templateParams["giochiRandomFunc"] = $dbh->getGiochiRandom(3);
$templateParams["filtri"] = [];

$templateParams["post"] = $dbh->getGenericPosts(4);

require 'template/base.php';
?>
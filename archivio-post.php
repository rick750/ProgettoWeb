<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "Unigames - Archivio";
$templateParams["nome"] = "lista-post.php";
$templateParams["selezionaFiltro"] = [];
$templateParams["aside"] = "lista-giochiRandom.php";
$templateParams["giochiRandomFunc"] = $dbh->getGiochiRandom(3);
$templateParams["post"] = $dbh->getGenericPosts(-1);

require 'template/base.php';
?>
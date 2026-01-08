<?php
require_once 'bootstrap.php';

$_SESSION["pagina_precedente"] = $_SERVER["REQUEST_URI"];
$templateParams["titolo"] = "Unigames - Archivio";
$templateParams["nome"] = "lista-post.php";
$templateParams["selezionaFiltro"] = [];
$templateParams["aside"] = "lista-giochiRandom.php";
$templateParams["giochiRandomFunc"] = $dbh->getGiochiRandom(3);
$templateParams["post"] = $dbh->getGenericPosts(-1);

require 'template/base.php';
?>
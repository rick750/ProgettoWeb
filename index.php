<?php
require_once 'bootstrap.php';
$_SESSION["pagina_precedente"] = $_SERVER["REQUEST_URI"];
$templateParams["titolo"] = "Unigames - Home";
$templateParams["nome"] = "lista-post.php";
$templateParams["selezionaFiltro"] = [];
$templateParams["aside"] = "lista-giochiRandom.php";
$templateParams["giochiRandomFunc"] = $dbh->getGiochiRandom(3);
$templateParams["filtri"] = [];
$templateParams["post"] = $dbh->getGenericPosts(4);
foreach ($templateParams["post"] as &$post) {
    $post["commenti"] = $dbh->getCommentiPost($post["crea_email"], $post["codicePost"]);
}
unset($post);
$templateParams["paginaAttuale"] = "index.php";

require 'template/base.php';
?>
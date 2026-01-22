<?php
require_once 'bootstrap.php';
if (isset($_SESSION["email"])) {
    $_SESSION["pagina_precedente"] = $_SERVER["REQUEST_URI"];
}
$templateParams["titolo"] = "Unigames - Archivio";
$templateParams["nome"] = "lista-post.php";
$templateParams["selezionaFiltro"] = [];
$templateParams["admin"] = $dbh->getAdmin(2);
$templateParams["aside"] = "lista-giochiRandom.php";
$templateParams["giochiRandomFunc"] = $dbh->getGiochiRandom(6);
$templateParams["post"] = $dbh->getGenericPosts(-1);
foreach ($templateParams["post"] as &$post) {
    $post["commenti"] = $dbh->getCommentiPost($post["crea_email"], $post["codicePost"]);
}
unset($post);
$templateParams["paginaAttuale"] = "archivio-post.php";

require 'template/base.php';
?>
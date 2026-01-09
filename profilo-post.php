<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "Unigames - Post dell'utente";
$templateParams["nome"] = "lista-post.php";
$templateParams["post"] = $dbh->getUserGenerici();
foreach ($templateParams["post"] as &$post) {
    $post["commenti"] = $dbh->getCommentiPost($post["crea_email"], $post["codicePost"]);
}
unset($post);
$templateParams["aside"] = "lista-giochiRandom.php";
$templateParams["giochiRandomFunc"] = $dbh->getGiochiRandom(3);
$templateParams["indietro"] = "profilo.php";
$templateParams["paginaAttuale"] = "profilo-post.php";


require 'template/base.php';
?>
<?php
require_once 'bootstrap.php';
if (!empty($_SESSION["email"])) {
    $templateParams["titolo"] = "Unigames - Post dell'utente";
    $templateParams["nome"] = "lista-post.php";
    $templateParams["post"] = $dbh->getUserGenerici();
    $_SESSION["pagina_precedente"] = $_SERVER["REQUEST_URI"];
    foreach ($templateParams["post"] as &$post) {
        $post["commenti"] = $dbh->getCommentiPost($post["crea_email"], $post["codicePost"]);
    }
    unset($post);
    $templateParams["aside"] = "lista-giochiRandom.php";
    $templateParams["giochiRandomFunc"] = $dbh->getGiochiRandom(3);
    $templateParams["indietro"] = "profilo.php";
    $templateParams["paginaAttuale"] = "profilo-post.php";


    require 'template/base.php';
}
?>
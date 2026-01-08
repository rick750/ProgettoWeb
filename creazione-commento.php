<?php
require_once 'bootstrap.php';
if (isset($_GET["action"]) && $_GET["action"] === "commento" && isset($_GET["id"]) && isset($_GET["crea_email"]) ) {
    // 1. Recupero ID post 
    $idPost = intval($_GET["id"]);

    // autore commento
    $autore = $_GET["crea_email"];

    $templateParams["post"] = $dbh->getPost($idPost, $autore); 
}

$templateParams["titolo"] = "Unigames - Nuovo Commento";
$templateParams["nome"] = "form-commento.php";

$templateParams["aside"] = "lista-giochiRandom.php";
$templateParams["giochiRandomFunc"] = $dbh->getGiochiRandom(3);
$templateParams["indietro"] = "index.php";

if (isset($_POST["autorePost"])) {
    $dbh->inserisciCommento($_POST["autorePost"], $_POST["codicePost"], $_POST["testo"]);
    unset($_POST["autorePost"]);
    header("Location: ".$templateParams["indietro"]);
}

require 'template/base.php';
?>
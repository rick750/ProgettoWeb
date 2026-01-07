<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "Unigames - Nuovo Post";
$templateParams["nome"] = "form-post.php";
$templateParams["giochi"] = $dbh->getLibreriaGiochi([]);

$templateParams["aside"] = "lista-giochiRandom.php";
$templateParams["giochiRandomFunc"] = $dbh->getGiochiRandom(3);
$templateParams["indietro"] = "profilo-post.php";

if (isset($_POST["tipo_post"])) {
    if ($_POST["tipo_post"] === "generico") {
        $dbh->inserisciGenerico(
            $_POST["titolo"],
            $_POST["testo_post"]
        );
    } else if ($_POST["tipo_post"] === "recensione") {
        $dbh->inserisciRecensione(
            $_POST["titolo"],
            $_POST["testo_rec"],
            $_POST["voto"],
            $_POST["scelta_gioco"]
        );
    }
    unset($_POST["tipo_post"]);
    header("Location: profilo-post.php");
}

require 'template/base.php';
?>
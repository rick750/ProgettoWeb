<?php
require_once 'bootstrap.php';
if (!empty($_SESSION["email"])) {
    if (isset($_GET["action"]) && $_GET["action"] === "commento" && isset($_GET["id"]) && isset($_GET["crea_email"])) {
        $idPost = intval($_GET["id"]);

        $autore = $_GET["crea_email"];

        $templateParams["post"] = $dbh->getPost($idPost, $autore);
    }

    $templateParams["titolo"] = "Unigames - Nuovo Commento";
    $templateParams["nome"] = "form-commento.php";

    $templateParams["admin"] = $dbh->getAdmin(2);
    $templateParams["aside"] = "lista-giochiRandom.php";
    $templateParams["giochiRandomFunc"] = $dbh->getGiochiRandom(3);
    $templateParams["indietro"] = $_SESSION["pagina_precedente"];

    if (isset($_POST["autorePost"])) {
        if (!empty($_POST["testo"])) {
            $dbh->inserisciCommento($_POST["autorePost"], $_POST["codicePost"], $_POST["testo"]);
        }
        unset($_POST["autorePost"]);
        header("Location: " . $templateParams["indietro"]);
    }

    require 'template/base.php';
}
?>
<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "Unigames - Nuovo Post";
$templateParams["nome"] = "form-post.php";
$templateParams["giochi"] = $dbh->getLibreriaGiochi([]);

$templateParams["aside"] = "lista-giochiRandom.php";
$templateParams["giochiRandomFunc"] = $dbh->getGiochiRandom(3);
$templateParams["indietro"] = "profilo-post.php";
$riuscito = false;
if (isset($_POST["tipo_post"])) {
    if (empty($_POST["titolo"])) {
        $templateParams["errore_post"] = "Il titolo non può essere vuoto";
    } else {
        if ($_POST["tipo_post"] === "generico") {
            if (empty($_POST["testo_post"])) {
                $templateParams["errore_post"] = "Il testo del post non può essere vuoto";
            } else {
                $paginaSuccessiva = "profilo-post.php";
                $riuscito = $dbh->inserisciGenerico(
                    $_POST["titolo"],
                    $_POST["testo_post"]
                );
            }
        } else if ($_POST["tipo_post"] === "recensione") {
            if (empty($_POST["scelta_gioco"])) {
                $templateParams["errore_post"] = "Devi selezionare un gioco";
            } else if (empty($_POST["voto"])) {
                $templateParams["errore_post"] = "Devi selezionare un voto";
            } else if (empty($_POST["testo_rec"])) {
                $templateParams["errore_post"] = "Il testo della recensione non può essere vuoto";
            } else {
                $paginaSuccessiva = "profilo-recensioni.php";
                $riuscito = $dbh->inserisciRecensione(
                    $_POST["titolo"],
                    $_POST["testo_rec"],
                    $_POST["voto"],
                    $_POST["scelta_gioco"]
                );
            }
        }
    }
    unset($_POST["tipo_post"]);
    if ($riuscito) {
        header("Location: ".$paginaSuccessiva);
    }
}

require 'template/base.php';
?>
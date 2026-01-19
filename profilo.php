<?php
require_once 'bootstrap.php';

if (!empty($_SESSION)) {
    $templateParams["titolo"] = "Unigames - Profilo";
    $templateParams["nome"] = "profilo-menu.php";

    $templateParams["aside"] = "lista-giochiRandom.php";
    $templateParams["giochiRandomFunc"] = $dbh->getGiochiRandom(3);
    $templateParams["infoUtente"] = $dbh->getUser($_SESSION["email"]);
    $templateParams["corsi"] = $dbh->getCorsi();
    $templateParams["vecchioCorso"] = $dbh->getCorsoForUtente();
    if (isset($_POST["modificaProfilo"])) {
        if (!empty($_POST["descrizioneModificata"]) && !empty($_POST["codiceCorsoModificato"])) {
            $dbh->modificaUtente(
                $_POST["codiceCorsoModificato"],
                $_POST["descrizioneModificata"]
            );
        }
        header("Location: profilo.php");
    }
    require 'template/base.php';
}

?>
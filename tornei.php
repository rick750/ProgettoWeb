<?php
require_once 'bootstrap.php';
if (!empty($_SESSION["email"])) {
    $_SESSION["pagina_precedente"] = $_SERVER["REQUEST_URI"];
    $templateParams["titolo"] = "Unigames - Tornei";
    $templateParams["nome"] = "lista-tornei.php";
    $templateParams["aside"] = "lista-giochiRandom.php";
    $templateParams["giochiRandomFunc"] = $dbh->getGiochiRandom(3);

    $templateParams["filtri"] = [
        ["valore" => "iscritto", "nome" => "Iscritto"]
    ];
    $templateParams["selezionaFiltro"] = $_GET["filter"] ?? [];
    $filtri = $templateParams["selezionaFiltro"];
    $mostraSoloIscritto = in_array("iscritto", $filtri);

    if ($mostraSoloIscritto) {
        $tornei = $dbh->getTorneiIscritto();
        foreach ($tornei as &$torneo) {
            $torneo["iscritto"] = true;
        }
    } else {
        $tornei = $dbh->getTornei();
        $torneiIscritto = $dbh->getTorneiIscritto();
        foreach ($tornei as &$torneo) {
            $torneo["iscritto"] = in_array($torneo, $torneiIscritto);
        }
    }
    unset($torneo);
    $templateParams["tornei"] = $tornei;

    if (isset($_POST["azione"]) && $_POST["azione"] === "iscrizione") {
        $dbh->iscriviUtenteATorneo($_POST["codiceGioco"], $_POST["codiceTorneo"]);
        unset($_POST["azione"]);
        unset($_POST["codiceTorneo"]);
        header("Location: ".$_SESSION["pagina_precedente"]);
    } else if (isset($_POST["azione"]) && $_POST["azione"] === "disiscrizione") {
        $dbh->disiscriviUtenteDaTorneo($_POST["codiceGioco"], $_POST["codiceTorneo"]);
        unset($_POST["azione"]);
        unset($_POST["codiceTorneo"]);
        header("Location: ".$_SESSION["pagina_precedente"]);
    }

    if (isset($_POST["elimina"])) {
        $dbh->eliminaTorneo($_POST["cancellaTorneo"]);
        unset($_POST["elimina"]);
        unset($_POST["cancellaTorneo"]);
        header("Location: ".$_SESSION["pagina_precedente"]);
    }
    require 'template/base.php';
}
?>
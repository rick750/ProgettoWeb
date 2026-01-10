<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "Unigames - Nuovo Torneo";
$templateParams["nome"] = "form-torneo.php";
$templateParams["giochi"] = $dbh->getLibreriaGiochi([]);

$templateParams["aside"] = "lista-giochiRandom.php";
$templateParams["giochiRandomFunc"] = $dbh->getGiochiRandom(3);
$templateParams["indietro"] = "profilo-tornei.php";
$valid = true;

if (isset($_POST["torneo"])) {
    $oggi = new DateTime();
    if (empty($_POST["scelta_gioco"])) {
        $templateParams["errore_torneo"] = "Scegliere il gioco a cui dedicare il torneo";
        $valid = false;
    } else if (empty($_POST["data"])) {
        $templateParams["errore_torneo"] = "Scegliere la data del torneo";
        $valid = false;
    } else {
        $dataInput = new DateTime($_POST["data"]);
        $differenza = $oggi->diff($dataInput);
        if ($differenza->invert === 1) {
            $templateParams["errore_torneo"] = "La data deve essere DOPO quella odierna";
            $valid = false;
        }
    }
    if (empty($_POST["descrizione"]) && $valid) {
        $templateParams["errore_torneo"] = "Riportare una descrizione per il torneo";
        $valid = false;
    }
    if ($valid) {
        $dbh->inserisciTorneo($_POST["scelta_gioco"], $_POST["data"], $_POST["descrizione"]);
        header("Location: profilo-tornei.php");
    }
}
require 'template/base.php';
?>
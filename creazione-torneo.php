<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "Unigames - Nuovo Torneo";
$templateParams["nome"] = "form-torneo.php";
$templateParams["giochi"] = $dbh->getLibreriaGiochi([]);

$templateParams["aside"] = "lista-giochiRandom.php";
$templateParams["giochiRandomFunc"] = $dbh->getGiochiRandom(3);
$templateParams["indietro"] = "profilo-tornei.php";

if (isset($_POST["torneo"])) {
    $dbh->inserisciTorneo($_POST["scelta_gioco"], $_POST["data"], $_POST["descrizione"]);
    unset($_POST["torneo"]);
    header("Location: profilo-tornei.php");
}

require 'template/base.php';
?>
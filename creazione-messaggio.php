<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "Unigames - Nuovo Messaggio";
$templateParams["nome"] = "form-messaggio.php";
$templateParams["utenti"] = $dbh -> getUsers();
$templateParams["aside"] = "lista-giochiRandom.php";
$templateParams["giochiRandomFunc"] = $dbh->getGiochiRandom(3);
$templateParams["indietro"] = "profilo.php";
if (isset($_POST["messaggio"])) {
    if(empty($_POST["scelta_destinatario"])) {
        $templateParams["errore_messaggio"] = "Inserire il destinatario del messaggio";
    } else if (empty($_POST["testo"])) {
        $templateParams["errore_messaggio"] = "Scrivere il testo da inviare";
    } else {
        $dbh->inserisciMessaggio($_POST["scelta_destinatario"], $_POST["testo"]);
        unset($_POST["messaggio"]);
        header("Location: profilo.php");
    }

}
require 'template/base.php';
?>
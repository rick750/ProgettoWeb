<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "Unigames - Nuovo Messaggio";
$templateParams["nome"] = "form-messaggio.php";
$templateParams["utenti"] = $dbh -> getUsers();
$templateParams["aside"] = "lista-giochiRandom.php";
$templateParams["giochiRandomFunc"] = $dbh->getGiochiRandom(3);
$templateParams["indietro"] = "profilo.php";

if (isset($_POST["messaggio"])) {
    $dbh->inserisciMessaggio($_POST["scelta_destinatario"], $_POST["testo"]);
    unset($_POST["messaggio"]);
    header("Location: profilo.php");
}
require 'template/base.php';
?>
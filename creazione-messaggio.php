<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "Unigames - Nuovo Messaggio";
$templateParams["nome"] = "form-messaggio.php";
$templateParams["utenti"] = $dbh->getUsers();
$templateParams["aside"] = "lista-giochiRandom.php";
$templateParams["giochiRandomFunc"] = $dbh->getGiochiRandom(3);
$templateParams["indietro"] = "profilo.php";

$templateParams["destinatarioObbligato"] = $_POST["destinatarioObbligato"] ?? "";
if (isset($_GET["email"])) {
    $templateParams["destinatarioObbligato"] = $_GET['email'];
    $templateParams["indietro"] = "notifiche.php";
}

if (isset($_POST["messaggio"])) {
    if (empty($_POST["scelta_destinatario"])) {
        $templateParams["errore_messaggio"] = "Inserire il destinatario del messaggio";
    } else if (empty($_POST["testo"])) {
        $templateParams["errore_messaggio"] = "Scrivere il testo da inviare";
    } else {
        $dbh->inserisciMessaggio($_POST["scelta_destinatario"], $_POST["testo"]);
        unset($_POST["messaggio"]);
        $templateParams["indietro"] = $_POST["indietro"] ?? "profilo.php";
        header("Location: " . $templateParams["indietro"]);
        unset($_SESSION["indietro"]);
        exit;
    }
}
require 'template/base.php';
?>
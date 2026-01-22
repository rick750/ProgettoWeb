<?php
require_once 'bootstrap.php';

if (!empty($_SESSION["email"])) {
    $email = $_GET['email'] ?? '';

    $templateParams["titolo"] = "Unigames - Dettaglio Utente";
    $templateParams["nome"] = "dettaglio-utente.php";
    $templateParams["aside"] = "lista-giochiRandom.php";
    $templateParams["admin"] = $dbh->getAdmin(2);
    $templateParams["filtri"] = [];
    $templateParams["giochiRandomFunc"] = $dbh->getGiochiRandom(3);

    if (!empty($email)) {
        $templateParams["utente"] = $dbh->getUser($email);
    }

    require 'template/base.php';
}
?>
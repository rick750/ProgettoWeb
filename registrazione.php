<?php
require_once 'bootstrap.php';

$templateParams["filtri"] = [];
$templateParams["titolo"] = "Unigames - Registrazione";
$templateParams["nome"] = "login-form.php";
$templateParams["aside"] = "login-aside.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $ok = $dbh->registraUtente(
        $_POST["email"],
        $_POST["password"],
        $_POST["nome"],
        $_POST["cognome"],
        $_POST["data_nascita"],
        $_POST["matricola"],
        $_POST["descr"],
        $_POST["codiceCorso"]
    );

    if ($ok) {
        if (count($dbh -> isUserAdmin($_POST["email"])) != 0) {
            $isAdmin = true;
        } else {
            $isAdmin = false;
        }
        registerLoggedUser([
            "email" => $_POST["email"],
            "nome" => $_POST["nome"]
        ], $isAdmin);
        header("Location: profilo.php");
        exit;
    } else {
        $templateParams["errore_registrazione"] = "Errore durante la registrazione";
    }
}

require 'template/base.php';
?>
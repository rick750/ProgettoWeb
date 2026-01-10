<?php
require_once 'bootstrap.php';

$templateParams["filtri"] = [];
$templateParams["titolo"] = "Unigames - Registrazione";
$templateParams["corsi"] = $dbh->getCorsi();
$templateParams["nome"] = "login-main.php";
$templateParams["aside"] = "login-aside.php";
$valido = true;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $oggi = new DateTime();
    if (!empty($_POST["data_nascita"])) {
        $dataInput = new DateTime($_POST["data_nascita"]);
        $differenza = $oggi->diff($dataInput);
    } else {
        $differenza = $oggi->diff(new DateTime());
        $templateParams["errore_registrazione"] = "La data di nascita non può essere vuota";
        $valido = false;
    }

    if (empty($_POST["nome"]) || empty($_POST["cognome"])) {
        $templateParams["errore_registrazione"] = "Nome e cognome non possono essere vuoti";
        $valido = false;
    } else if ($differenza->y < 18) {
        $templateParams["errore_registrazione"] = "La data di nascita non è valida";
        $valido = false;
    } else if (!ctype_digit($_POST["matricola"]) || strlen($_POST["matricola"]) != 10) {
        $templateParams["errore_registrazione"] = "La matricola inserita non è valida";
        $valido = false;
    } else if (!preg_match('/^[a-zA-Z0-9]+\.[a-zA-Z0-9]+@studio\.unibo\.it$/', $_POST["email"])) {
        $templateParams["errore_registrazione"] = "La mail inserita non è nel formato corretto";
        $valido = false;
    } else if (strlen($_POST["password"]) < 8) {
        $templateParams["errore_registrazione"] = "La password inserita è troppo corta";
        $valido = false;
    } else if (empty($_POST["codiceCorso"])) {
        $templateParams["errore_registrazione"] = "La selezione del corso è obbligatoria";
        $valido = false;
    } else if (empty($_POST["descr"])) {
        $templateParams["errore_registrazione"] = "La descrizione non può essere lasciata vuota";
        $valido = false;
    }
    if ($valido) {
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
            if (count($dbh->isUserAdmin($_POST["email"])) != 0) {
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
}


require 'template/base.php';
?>
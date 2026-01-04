<?php
require_once 'bootstrap.php';

$templateParams["filtri"] = [];
$templateParams["titolo"] = "Unigames - Login";
$templateParams["nome"] = "login-form.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $user = $dbh->checkLogin($_POST["email"], $_POST["password"]);

    if ($user) {
        registerLoggedUser($user);
        header("Location: profilo.php");
        exit;
    } else {
        $templateParams["errore_login"] = "Email o password non corrette";
    }
}

require 'template/base.php';
?>
<?php
require_once 'bootstrap.php';

$templateParams["filtri"] = [];
$templateParams["titolo"] = "Unigames - Login";
$templateParams["nome"] = "login-main.php";
$templateParams["aside"] = "login-aside.php";
$templateParams["corsi"] = $dbh->getCorsi();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $user = $dbh->checkLogin($_POST["email"], $_POST["password"]);

    if ($user) {
        if (count($dbh -> isUserAdmin($_POST["email"])) != 0) {
            $isAdmin = true;
        } else {
            $isAdmin = false;
        }
        registerLoggedUser($user, $isAdmin);
        header("Location: profilo.php");
        exit;
    } else {
        $templateParams["errore_login"] = "Email o password non corrette";
    }
}

require 'template/base.php';
?>
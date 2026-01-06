<?php 

function isUserLoggedIn(){
    return !empty($_SESSION['email']);
}
function registerLoggedUser($user, $isAdmin){
    $_SESSION["email"] = $user["email"];
    $_SESSION["nome"] = $user["nome"];
    $_SESSION["admin"] = $isAdmin;
}

function userLogOut(){
    unset($_SESSION["email"]);
    unset($_SESSION["nome"]);
    unset($_SESSION["admin"]);
}

function getValueFromCorso($corso){
    $corso = strtolower($corso);
    $corso = str_replace(' ', '_', $corso);
    $corso = preg_replace('/[^a-z0-9_]/', '', $corso);

    return $corso;
}


?>
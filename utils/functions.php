<?php 

function isActive($pagename) {
    return (basename($_SERVER['PHP_SELF'])==$pagename);
}

function isActiveNav($pagename){
    if(isActive($pagename)){
        echo " fw-bold text-decoration-underline active ";
    }
}

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
    unset($_SESSION["pagina_precedente"]);
}

function getValueFromCorso($corso){
    $corso = strtolower($corso);
    $corso = str_replace(' ', '_', $corso);
    $corso = preg_replace('/[^a-z0-9_]/', '', $corso);

    return $corso;
}

?>
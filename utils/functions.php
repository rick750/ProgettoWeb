<?php 

function isUserLoggedIn(){
    return !empty($_SESSION['email']);
}
function registerLoggedUser($user, $isAdmin){
    $_SESSION["email"] = $user["email"];
    $_SESSION["nome"] = $user["nome"];
    $_SESSION["admin"] = $isAdmin;
}

?>
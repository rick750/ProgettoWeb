<?php 

function isUserLoggedIn(){
    return !empty($_SESSION['email']);
}
function registerLoggedUser($user){
    $_SESSION["email"] = $user["email"];
    $_SESSION["nome"] = $user["nome"];
}

?>
<?php
require_once 'bootstrap.php';
if (!empty($_SESSION["email"])) {
    if (isset($_POST["nuovo_tag"])) {
        if (!empty($_POST["tag"])) {
            $dbh->addTag($_POST["tag"]);
        }
        unset($_POST["autorePost"]);
        header("Location: profilo-giochi.php");
    }
}
?>
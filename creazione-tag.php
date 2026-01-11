<?php
require_once 'bootstrap.php';

if (isset($_POST["nuovo_tag"])) {
    if (!empty($_POST["tag"])) {
        $dbh->addTag($_POST["tag"]);
    }
    unset($_POST["autorePost"]);
    header("Location: profilo-giochi.php");
}
?>
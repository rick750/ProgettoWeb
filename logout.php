<?php
session_start();
require_once "utils/functions.php";
if (!empty($_SESSION["email"])) {
    userLogOut();
}
header("Location: login.php");
exit;
?>
<?php
session_start();
require_once "utils/functions.php";

userLogOut();

header("Location: login.php");
exit;
?>

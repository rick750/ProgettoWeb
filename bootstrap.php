<?php
session_start();
define("UPLOAD_DIR", "./upload/");
//require_once("utils/functions.php");
require_once("db/database.php");
require_once("utils/functions.php");
$dbh = new DatabaseHelper("localhost", "root", "", "Unigames_db", 3306);
?>
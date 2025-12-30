<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Unigames - Home";
$templateParams["nome"] = "lista-post.php";
//Home Template
$templateParams["post"] = $dbh->getPosts(2);

require 'template/base.php';
?>
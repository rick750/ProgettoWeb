<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Unigames - Home";
$templateParams["nome"] = "lista-post.php";
$templateParams["giochiRandom"] = "lista-giochiRandom.php";
$templateParams["giochiRandomFunc"] = $dbh->getGiochiRandom(2);
//Home Template
$templateParams["filtri"] = $dbh->getTags();
$templateParams["post"] = $dbh->getGenericPosts(2);
$templateParams["recensioni"] = $dbh->getRecensioni(2);

require 'template/base.php';
?>
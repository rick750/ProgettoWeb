<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Unigames - Home";
$templateParams["nome"] = "lista-post.php";
$templateParams["tag"] = $dbh->getTags();
//Home Template
$templateParams["post"] = $dbh->getGenericPosts(2);
$templateParams["recensioni"] = $dbh->getRecensioni(2);

require 'template/base.php';
?>
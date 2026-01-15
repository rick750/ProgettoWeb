<?php
require_once 'bootstrap.php';
if (!empty($_SESSION)) {
    if (isset($_POST["eliminaCommento"])) {
        $dbh->eliminaCommento($_POST["cancellaCreaEmail"], $_POST["cancellaCodicePost"], $_POST["cancellaCodiceCommento"]);
        header("Location: " . $_POST["paginaDiRitorno"]);
    } else if (isset($_POST["eliminaPost"])) {
        if (array_key_exists("cancellaTipoPost", $_POST)) {
            if ($_POST["cancellaTipoPost"] === null) {
                //è una recensione
                $dbh->eliminaPost($_POST["cancellaCreaEmail"], $_POST["cancellaCodicePost"], false);
            } else {
                //è un generico
                $dbh->eliminaPost($_POST["cancellaCreaEmail"], $_POST["cancellaCodicePost"], true);
            }
            header("Location: " . $_POST["paginaDiRitorno"]);
        }
    }
}
?>
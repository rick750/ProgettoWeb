<?php
require_once 'bootstrap.php';
if (!empty($_SESSION["email"])) {
    if (isset($_POST["eliminaCommento"])) {
        $dbh->eliminaCommento($_POST["cancellaCreaEmail"], $_POST["cancellaCodicePost"], $_POST["cancellaCodiceCommento"]);
        header("Location: " . $_POST["paginaDiRitorno"]);
    } else if (isset($_POST["eliminaPost"])) {
        if (array_key_exists("cancellaTipoPost", $_POST)) {
            if ($_POST["cancellaTipoPost"] === "R") {
                //è una recensione
                $dbh->eliminaPost($_POST["cancellaCreaEmail"], $_POST["cancellaCodicePost"], false);
            } else {
                //è un generico
                $dbh->eliminaPost($_POST["cancellaCreaEmail"], $_POST["cancellaCodicePost"], true);
            }
            header("Location: " . $_POST["paginaDiRitorno"]);
        }
    } else if(isset($_POST["modificaPost"])) {
        if (array_key_exists("tipoPost", $_POST)) {
            //è una recensione
            if ($_POST["tipoPost"] === "R") {
                if(!empty($_POST["voto"]) && !empty($_POST["testo_post"])) {
                    $dbh->modificaPost($_POST["creaEmail"], $_POST["codicePost"], $_POST["voto"], $_POST["testo_post"], false);
                }
                header("Location: " . $_POST["paginaDiRitorno"]);
            } else {
                //è un generico
                if(!empty($_POST["testo_post"])) {
                    $dbh->modificaPost($_POST["creaEmail"], $_POST["codicePost"], 0.0, $_POST["testo_post"], true);
                }
                header("Location: " . $_POST["paginaDiRitorno"]);
            }
        }
    } else if (isset($_POST["modificaCommento"])) {
        if(!empty($_POST["testo_commento"])) {
            $dbh->modificaCommento($_POST["creaEmail"], $_POST["codicePost"], $_POST["codiceCommento"],
                $_POST["testo_commento"]);            
        }
        header("Location: " . $_POST["paginaDiRitorno"]);
        
    } else if(isset($_POST["modificaTorneo"])) {
        if(!empty($_POST["data"]) && !empty($_POST["descrizione"])) {
            $oggi = new DateTime();
            $dataInput = new DateTime($_POST["data"]);
            $differenza = $oggi->diff($dataInput);
            if ($differenza->invert === 0) { //0-> dataInput nel futuro 1-> dataInput nel passato
                $dbh->modificaTorneo($_POST["codiceTorneo"], $_POST["data"], $_POST["descrizione"]);
            }
        }
        header("Location: " . $_POST["paginaDiRitorno"]);
    }
}
?>
<?php
require_once 'bootstrap.php';
if (!empty($_SESSION["email"])) {
    $templateParams["titolo"] = "Unigames - Nuovo Gioco";
    $templateParams["nome"] = "form-gioco.php";
    $templateParams["aside"] = "lista-giochiRandom.php";
    $templateParams["giochiRandomFunc"] = $dbh->getGiochiRandom(3);
    $templateParams["tags"] = $dbh->getTags();
    $templateParams["indietro"] = "profilo-giochi.php";
    $valido = true;
    if (isset($_POST["gioco"])) {
        if (!empty($_POST["pubblicazione"])) {
            $oggi = new DateTime();
            $dataInput = new DateTime($_POST["pubblicazione"]);
            $differenza = $oggi->diff($dataInput);
        }
        if (empty($_POST["nome"])) {
            $templateParams["errore_gioco"] = "Il nome non può essere vuoto";
            $valido = false;
        } else if (empty($_POST["pubblicazione"])) {
            $templateParams["errore_gioco"] = "la data di uscita non può essere vuota";
            $valido = false;
        } else if ($differenza->invert === 0) {
            $templateParams["errore_gioco"] = "La data di uscita deve essere nei giorni precedenti";
            $valido = false;
        } else if (empty($_POST["softwareHouse"])) {
            $templateParams["errore_gioco"] = "La software House non può essere vuota";
            $valido = false;
        } else if (empty($_POST["valutazione"])) {
            $templateParams["errore_gioco"] = "La valutazione non può essere vuota";
            $valido = false;
        } else if (empty($_POST["tags"])) {
            $templateParams["errore_gioco"] = "Seleziona almeno un tag";
            $valido = false;
        } else if (empty($_POST["descrizione"])) {
            $templateParams["errore_gioco"] = "La descrizione non può essere lasciata vuota";
            $valido = false;
        } else if ($_FILES['immagine']['error'] != UPLOAD_ERR_OK) {
            $templateParams["errore_gioco"] = "Seleziona dal file system un'immagine";
            $valido = false;
        }
        if ($valido) {
            if (isset($_FILES['immagine'])) {
                $fileTmpPath = $_FILES['immagine']['tmp_name'];
                $fileName = $_FILES['immagine']['name']; // Percorso di destinazione 
                $destPath = "upload/" . $fileName; // Sposta il file nella cartella finale
                if (move_uploaded_file($fileTmpPath, $destPath)) {
                    $dbh->addGioco(
                        $_POST["nome"],
                        $_POST["pubblicazione"],
                        $_POST["softwareHouse"],
                        $_POST["valutazione"],
                        $_POST["descrizione"],
                        $fileName,
                        $_POST["tags"]
                    );
                }
            } else {
                $templateParams["errore_gioco"] = "Errore durante il caricamento dell'immagine";
            }
            unset($_POST["gioco"]);
        }
    }
    require 'template/base.php';
}
?>
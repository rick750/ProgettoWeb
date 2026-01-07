<?php
class DatabaseHelper
{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port)
    {
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);

        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    public function getConnection()
    {
        return $this->db;
    }


    public function getGenericPosts($n = -1)
    {
        $query = "SELECT p.*
                    FROM POST p
                    JOIN GENERICO g
                    ON p.crea_email = g.crea_email
                    AND p.codicePost = g.codicePost
                    ORDER BY p.data DESC
                    ";
        if ($n > 0) {
            $query .= " LIMIT ?;";
        } else {
            $query .= ";";
        }
        $stmt = $this->db->prepare($query);
        if ($n > 0) {
            $stmt->bind_param('i', $n);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getRecensioni($n = -1)
    {
        $query = "SELECT p.*, r.valutazione, g.nome
                    FROM POST p
                    JOIN RECENSIONE r
                    JOIN GIOCO g
                    ON p.crea_email = r.crea_email
                    AND p.codicePost = r.codicePost
                    AND r.codiceGioco = g.codiceGioco
                    ORDER BY p.data DESC
                    ";
        if ($n > 0) {
            $query .= " LIMIT ?;";
        } else {
            $query .= ";";
        }
        $stmt = $this->db->prepare($query);
        if ($n > 0) {
            $stmt->bind_param('i', $n);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getTags()
    {
        $query = "SELECT t.codiceTag, t.nome
              FROM TAG t";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function getTornei()
    {
        $query = "SELECT t.nome AS nomeTorneo, g.nome AS nomeGioco, t.descrizione, t.data, t.codiceGioco, t.codiceTorneo
                    FROM TORNEO t, GIOCO g
                    WHERE g.codiceGioco = t.codiceGioco
                    ORDER BY t.data DESC;
                    ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getTorneiIscritto()
    {
        $email = $_SESSION["email"];

        $query = "
        SELECT 
            t.nome AS nomeTorneo,
            g.nome AS nomeGioco,
            t.descrizione,
            t.data,
            t.codiceGioco,
            t.codiceTorneo
        FROM TORNEO t
        JOIN GIOCO g
            ON g.codiceGioco = t.codiceGioco
        JOIN iscrizione i
            ON i.codiceGioco = t.codiceGioco
            AND i.codiceTorneo = t.codiceTorneo
        WHERE i.email = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function getGiochiRandom($n = -1)
    {
        $query = "SELECT g.codiceGioco, g.nome, g.valutazioneGiornalistica, g.immagine,
                     GROUP_CONCAT(t.nome SEPARATOR ', ') AS listaTag
                    FROM GIOCO g
                    LEFT JOIN riguarda r ON g.codiceGioco = r.codiceGioco
                    LEFT JOIN TAG t ON r.codiceTag = t.codiceTag
                    GROUP BY g.codiceGioco, g.nome, g.valutazioneGiornalistica
                    ORDER BY RAND()
                ";
        if ($n > 0) {
            $query .= " LIMIT ?;";
        }
        $stmt = $this->db->prepare($query);
        if ($n > 0) {
            $stmt->bind_param('i', $n);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getLibreriaGiochi($filtri = [])
    {
        $query = "SELECT g.*,
                     GROUP_CONCAT(t.nome SEPARATOR ', ') AS listaTag
              FROM GIOCO g
              LEFT JOIN riguarda r ON g.codiceGioco = r.codiceGioco
              LEFT JOIN TAG t ON r.codiceTag = t.codiceTag
              ";
        if (!empty($filtri)) {
            $in = implode(',', array_map('intval', $filtri));
            $query .= " WHERE g.codiceGioco IN (
                        SELECT g2.codiceGioco
                        FROM GIOCO g2
                        LEFT JOIN riguarda r2 ON g2.codiceGioco = r2.codiceGioco
                        WHERE r2.codiceTag IN ($in)
                    )";
        }

        $query .= " GROUP BY g.codiceGioco";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getNomeGioco($idGioco)
    {
        $query = "SELECT nome FROM GIOCO WHERE codiceGioco = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $idGioco);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row["nome"] ?? null;
    }

    public function getRecensioniGioco($idGioco)
    {
        $query = "
            SELECT 
                P.crea_email,
                P.codicePost,
                P.titolo,
                P.testo,
                P.data,
                R.valutazione
            FROM RECENSIONE R
            JOIN POST P 
                ON R.crea_email = P.crea_email 
                AND R.codicePost = P.codicePost
            WHERE R.codiceGioco = ?
            ORDER BY P.data DESC;";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$idGioco]);
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function checkLogin($email, $password)
    {
        $query = "SELECT email, password, nome
              FROM UTENTE
              WHERE email = ?";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        if ($result && password_verify($password, $result["password"])) {
            return $result;
        }
        return null;
    }


    public function registraUtente($email, $password, $nome, $cognome, $dataNascita, $matricola, $descrizione, $codiceCorso)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO UTENTE
        (email, password, nome, cognome, dataDiNascita, matricola, descrizione)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param(
            "sssssis",
            $email,
            $hash,
            $nome,
            $cognome,
            $dataNascita,
            $matricola,
            $descrizione
        );

        $res = $stmt->execute();

        $query2 = "INSERT INTO ISCRITTO
        (codiceCorso, email)
        VALUES (?, ?)";
        $stmt2 = $this->db->prepare($query2);
        $stmt2->bind_param(
            "is",
            $codiceCorso,
            $email
        );
        $stmt2->execute();

        return $res;
    }

    public function getUserPosts($email)
    {
        $query = "SELECT * FROM POST WHERE crea_email = ? ORDER BY data DESC;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserGenerici()
    {
        $email = $_SESSION["email"];
        $query = "SELECT * 
                    FROM POST 
                    WHERE crea_email = ? 
                    AND RECENSIONE IS NULL 
                    ORDER BY data DESC;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserRecensioni($email)
    {
        $query = "SELECT p.*
                    FROM POST p
                    JOIN RECENSIONE r
                    ON p.crea_email = r.crea_email
                    AND p.codicePost = r.codicePost
                    WHERE p.crea_email = ?
                    ORDER BY p.data DESC;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getTorneiCreati($email)
    {
        $query = "SELECT t.nome AS nomeTorneo, t.email , g.nome AS nomeGioco, t.descrizione, t.data
                    FROM TORNEO t, GIOCO g
                    WHERE g.codiceGioco = t.codiceGioco
                    AND t.email = ?
                    ORDER BY t.data DESC;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAdminGiochi($email)
    {
        $query = "SELECT g.*,
                     GROUP_CONCAT(t.nome SEPARATOR ', ') AS listaTag
              FROM GIOCO g
              LEFT JOIN riguarda r ON g.codiceGioco = r.codiceGioco
              LEFT JOIN TAG t ON r.codiceTag = t.codiceTag
              WHERE g.email = ?
              GROUP BY g.codiceGioco;
              ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function isUserAdmin($email)
    {
        $query = "SELECT * FROM ADMIN WHERE email = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCorsi()
    {
        $query = "SELECT * FROM CORSO";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function iscriviUtenteATorneo($codiceGioco, $codiceTorneo)
    {
        $email = $_SESSION["email"];
        $query = "INSERT INTO ISCRIZIONE VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("iis", $codiceGioco, $codiceTorneo, $email);

        return $stmt->execute();
    }

    public function disiscriviUtenteDaTorneo($codiceGioco, $codiceTorneo)
    {
        $email = $_SESSION["email"];
        $query = "DELETE FROM ISCRIZIONE WHERE codiceGioco=? AND codiceTorneo=? AND email=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("iis", $codiceGioco, $codiceTorneo, $email);

        return $stmt->execute();
    }

    private function creaCodicePost()
    {
        $email = $_SESSION["email"];
        $indice = count($this->getUserPosts($email));
        return $indice + 1;
    }

    private function inserisciPost($titolo, $testo, $codicePost, $isRecensione)
    {
        $email = $_SESSION["email"];
        $query = "INSERT INTO POST VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        if ($isRecensione) {
            $recensione = "R";
            $generico = NULL;
        } else {
            $recensione = NULL;
            $generico = "G";
        }
        $data = date("Y-m-d");
        $stmt->bind_param("sisssss", $email, $codicePost, $testo, $data, $titolo, $recensione, $generico);

        return $stmt->execute();
    }

    public function inserisciGenerico($titolo, $testo)
    {
        $email = $_SESSION["email"];
        $codicePost = $this->creaCodicePost();
        if ($this->inserisciPost($titolo, $testo, $codicePost, false)) {
            $query = "INSERT INTO GENERICO VALUES (?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("si", $email, $codicePost);
            return $stmt->execute();
        }
        return false;
    }

    public function inserisciRecensione($titolo, $testo, $valutazione, $codiceGioco)
    {
        $email = $_SESSION["email"];
        $codicePost = $this->creaCodicePost();
        if ($this->inserisciPost($titolo, $testo, $codicePost, true)) {
            $query = "INSERT INTO RECENSIONE VALUES (?, ?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("sidi", $email, $codicePost, $valutazione, $codiceGioco);
            return $stmt->execute();
        }
        return false;
    }
}
?>
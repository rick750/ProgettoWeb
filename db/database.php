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
        }
        $stmt = $this->db->prepare($query);
        if ($n > 0) {
            $stmt->bind_param('i', $n);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getRecensioni($n = -1) {
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
        }
        $stmt = $this->db->prepare($query);
        if ($n > 0) {
            $stmt->bind_param('i', $n);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getTags(){
        $query = "SELECT t.nome
                    FROM TAG t
                    ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function getTornei() {
        $query = "SELECT t.nome AS nomeTorneo, g.nome AS nomeGioco, t.descrizione, t.data
                    FROM TORNEO t, GIOCO g
                    WHERE g.codiceGioco = t.codiceGioco
                    ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getTorneiIscritto() {

    }
    public function getTorneiNonIscritto() {

    }

    public function getGiochiRandom($n = -1) {
        $query = "SELECT g.codiceGioco, g.nome, g.valutazioneGiornalistica,
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

}
?>
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

    public function getPosts($n = -1)
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

}
?>
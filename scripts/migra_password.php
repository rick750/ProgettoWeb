<?php
// scripts/migra_password.php

require_once __DIR__ . "/../db/database.php";

$dbHelper = new DatabaseHelper(
    "localhost",
    "root",
    "",
    "unigames_db",
    3306
);

$conn = $dbHelper->getConnection();

$res = $conn->query("SELECT email, password FROM UTENTE");

while ($row = $res->fetch_assoc()) {

    $hashedPassword = password_hash(
        $row['password'],
        PASSWORD_DEFAULT
    );

    $stmt = $conn->prepare(
        "UPDATE UTENTE SET password = ? WHERE email = ?"
    );
    $stmt->bind_param("ss", $hashedPassword, $row['email']);
    $stmt->execute();
}

echo "Migrazione password completata con successo.";

<?php
function conn()
{
    $host = "localhost";
    $utente_db = "root";
    $password_db = "";
    $nome_database = "quiz-app";

    // Creazione dell'oggetto di connessione
    $conn = new mysqli($host, $utente_db, $password_db, $nome_database);

    if ($conn->connect_error) {
        die("Connessione al database fallita: " . $conn->connect_error);
    }

    return $conn;
}
?>
<?php
include 'conn.php';
$conn = conn();

session_start();

$email = $_POST['email'];
$password = $_POST['password'];
$hash_password = password_hash($password, PASSWORD_DEFAULT);

$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$data_nascita = $_POST['data_nascita'];
$classe = $_POST['classe'];

$query = "INSERT INTO `user` (email, password, nome, cognome, data_nascita, classe) VALUES ('$email', '$hash_password', '$nome', '$cognome', '$data_nascita', '$classe')";

if ($conn->query($query) == TRUE) {
    $query = "SELECT * FROM `user` WHERE email = '$email'";
    $result = mysqli_query($conn, $query) or die("Errore query 1!" . mysqli_error($conn));

    $num_utente = mysqli_num_rows($result);
    if ($num_utente !== 0) {
        $utente = $result->fetch_assoc();
        $_SESSION['id'] = $utente['ID_utente'];
        $_SESSION['nome'] = $utente['nome'];
        $_SESSION['cognome'] = $utente['cognome'];
        $_SESSION['email'] = $email;
        if ($utente['classe'] == 0) {
            $_SESSION['classe'] = "non frequentante";
        } else {
            $_SESSION['classe'] = $utente['classe'];
        }

        header("location: ../homepage.php");
        exit;
    } else {
        header("location: ../sing-in.php?error=true");
        exit;
    }
} else {
    header("location: ../sing-in.php?error=true");
    exit;
}

<?php
include 'conn.php';
$conn = conn();

session_start();

$email = $_POST['email'];
$password = $_POST['password'];
$query = "SELECT * FROM `user` WHERE email = '$email'";
$result = mysqli_query($conn, $query) or die("Errore query 1!" . mysqli_error($conn));
$num_utente = mysqli_num_rows($result);

if ($num_utente !== 0) {
    $utente = mysqli_fetch_assoc($result);

    $hash_password = $utente['password'];

    if (password_verify($password, $hash_password)) {
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
        header("location: ../login.php?error=true");
        exit;
    }
} else {
    header("location: ../login.php?error=true");
    exit;
}

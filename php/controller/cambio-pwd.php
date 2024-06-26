<?php
include 'conn.php';
$conn = conn();

session_start();
if (isset($_SESSION['email']) && isset($_POST['vecchiapwd']) && isset($_POST['nuovapwd'])) {
    $email = $_SESSION['email'];
    $vecchiapwd = $_POST['vecchiapwd'];
    $nuovapwd = $_POST['nuovapwd'];

    $query = "SELECT * FROM `user` WHERE email = '$email'";
    $result = mysqli_query($conn, $query) or die("Errore query 1!" . mysqli_error($conn));
    $num_utente = mysqli_num_rows($result);

    if ($num_utente !== 0) {
        $utente = mysqli_fetch_assoc($result);
        $hash_passworddb = $utente['password'];

        if (password_verify($vecchiapwd, $hash_passworddb)) {
        	$hash_password = password_hash($nuovapwd, PASSWORD_DEFAULT);
            $query = "UPDATE user SET `password` = '$hash_password' WHERE `email` = '$email';";
            $result2 = mysqli_query($conn, $query) or die("Errore query 1!" . mysqli_error($conn));
            if ($result2) {
                $rows = mysqli_affected_rows($conn);
                if ($rows = 1) {
                    header("location: ../homepage.php");
                } else {
                    header("location: ../cambia-pwd.php?error=true");
                }
            }
        } else {
            header("location: ../cambia-pwd.php?error=true");
        }
    } else {
        header("location: ../cambia-pwd.php?error=true");
    }
} else {
    header("location: ../cambia-pwd.php?error=true");
}

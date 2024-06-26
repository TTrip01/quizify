<?php
include './controller/conn.php';
$conn = conn();

session_start();
?>

<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/icon-quiz.png" type="image/x-icon">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/access.css">
</head>

<body>
    <div class="container container-login">
        <form method="POST" class="p-5" action="./controller/login-ver.php">
            <h3 class="title">LOGIN</h3>
            <hr class="mb-5">
            <div class="form-group">
                <label for="email">Indirizzo Email</label>
                <div class="input-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
            </div>
            <div class="form-group mt-5">
                <label for="password">Password</label>
                <div class="input-group mb-3">
                    <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
                    <button type="button" class="btn btn-outline-secondary" id="togglePassword"><i class="fas fa-eye-slash"></i></button>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-login" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Login
            </button>
            <?php
            if (isset($_GET['error']) && $_GET['error'] == 'true') {
            ?>
                <div class="alert alert-danger mt-3" role="alert">
                    Errore! Email o password errata, riprova...
                </div>
            <?php
            }
            ?>
            <p>Non hai un account? <a href="./sing-in.php">Registrati</a></p>
        </form>
    </div>


    <script src="../js/view-pwd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
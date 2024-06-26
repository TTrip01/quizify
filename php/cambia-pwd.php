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
    <title>Quizify</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>
    <?php include './controller/header.php'; ?>

    <div class="container">
        <div class="user-info p-5">
            <form method="POST" action="./controller/cambio-pwd.php">
                <h3 class="text-center">Aggiorna la tua password</h3>
                <hr>
                <div class="form-group my-5">
                    <label class="mb-2" for="password">Vecchia Password</label>
                    <div class="input-group mb-3">
                        <input type="password" id="password" class="form-control" name="vecchiapwd" placeholder="Vecchia Password" aria-describedby="button-addon2" required>
                        <button type="button" class="btn btn-outline-secondary" id="togglePassword"><i class="fas fa-eye-slash"></i></button>
                    </div>
                </div>
                <div class="form-group mt-5">
                    <label class="mb-2" for="password">Nuova Password</label>
                    <div class="input-group mb-3">
                        <input type="password" id="password" class="form-control" name="nuovapwd" placeholder="Nuova Password" aria-describedby="button-addon2" required>
                        <button type="button" class="btn btn-outline-secondary" id="togglePassword"><i class="fas fa-eye-slash"></i></button>
                    </div>
                </div>
                <?php
                if (isset($_GET['error']) && $_GET['error'] == 'true') {
                ?>
                    <div class="alert alert-danger mt-3" role="alert">
                        Errore! Password errata, riprova...
                    </div>
                <?php
                }
                ?>
                <button type="submit" class="btn btn-primary my-btn-1 mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Cambia
                </button>
            </form>
        </div>
    </div>
    <script src="../js/view-pwd.js"></script>
</body>

</html>
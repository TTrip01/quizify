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
    <title>Registrati</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/access.css">
</head>

<body>
    <div class="container container-singin">
        <form method="POST" action="./controller/sing-in-ver.php" class="p-5">
            <h3 class="title">REGISTRAZIONE</h3>
            <hr>
            <div class="d-flex">
                <div class="form-group w-100">
                    <label for="nome">Nome</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required>
                    </div>
                </div>
                <div class="form-group w-100">
                    <label for="cognome">Cognome</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="cognome" name="cognome" placeholder="Cognome" required>
                    </div>
                </div>
            </div>
            <div class="d-flex">
                <div class="form-group w-100">
                    <label for="email">Email</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>
                </div>
                <div class="form-group w-100">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
                        <button type="button" class="btn btn-outline-secondary" id="togglePassword"><i class="fas fa-eye-slash"></i></button>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="data_nascita">Data di Nascita</label><br>
                <input type="date" id="data_nascita" name="data_nascita" required>
            </div>
            <div class="form-group">
                <label for="classe">Seleziona la tua classe</label><br>
                <select id="classe" name="classe" required>
                    <option value="0">Non frequentante</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <?php
            if (isset($_GET['error']) && $_GET['error'] == 'true') {
            ?>
                <div class="alert alert-danger mt-3" role="alert">
                    Errore! Account gia' esistente, effettua il <a href="./login.php">login</a>
                </div>
            <?php
            }
            ?>
            <button type="submit" class="btn btn-primary btn-login mt-3" style="width: 100%;">Registrati</button>
            <p>Hai gia' un account? <a href="./login.php">Accedi</a></p>
        </form>
    </div>
    <script src="../js/view-pwd.js"></script>
</body>

</html>
<?php
include './controller/conn.php';
$conn = conn();

session_start();
if (isset($_SESSION['id'])) {
    $id_utente = $_SESSION['id'];
    $query = "SELECT DISTINCT `argomento` FROM `risposte` WHERE ID_utente = '$id_utente'";
    $tab_schede = mysqli_query($conn, $query) or die("Errore query 1!");
    $num_schede = mysqli_num_rows($tab_schede);
}
?>

<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/icon-quiz.png" type="image/x-icon">
    <title>Area Utente Quizify</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>
    <?php include './controller/header.php'; ?>

    <div class="container">
        <div class="user-info p-4">
            <?php
            if (isset($_SESSION['email'])) {
                $email = $_SESSION['email'];
                $classe = $_SESSION['classe'];
            ?>
                <div class="container text-center">
                    <img class="img-p" src="https://static.vecteezy.com/ti/vettori-gratis/t1/2534006-social-media-chat-online-immagine-profilo-vuoto-icona-testa-e-corpo-persone-in-piedi-icona-sfondo-grigio-gratuito-vettoriale.jpg">
                </div>
                <h2>Benvenuto/a, <?php echo $nome . " " . $cognome; ?>!</h2>
                <hr>
                <p><b>Classe:</b> <?php echo $classe ?></p>
                <p><b>Email:</b> <?php echo $email ?></p>
                <p><a href="cambia-pwd.php">Modifica password</a></p>
            <?php
            } else {
            ?>
                <h2 class="text-center">ERRORE</h2>
                <hr>
                <p class="text-center">DEVI EFFETTUARE L'ACCESSO</p>
            <?php
            }
            ?>
        </div>
        <?php
        if (isset($_SESSION['email'])) {
        ?>
            <div class="schede p-4">
                <h2 class="text-center">Le tue schede:</h2>
                <hr>
                <?php
                if ($num_schede != 0) {
                    for ($i = 0; $i < $num_schede; $i++) {
                        $schede = mysqli_fetch_array($tab_schede);
                ?>
                        <div class="my-4">
                            <h5><?php echo $schede['argomento'] ?></h5>
                            <a href="./scheda.php?arg=<?php echo $schede['argomento'] ?>&pag=1"><img src="../img/icon-scheda.png"></a>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <p class="text-center p-5"><i>Inizia subito a fare dei quiz nella nostra app tramite l'homepage!!</i></p>
                <?php
                }

                ?>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>
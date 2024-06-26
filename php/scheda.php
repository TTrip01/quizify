<?php
include './controller/conn.php';
$conn = conn();

session_start();

if (!isset($_GET['arg'])) {
    header("location: ./homepage.php");
    exit;
} else {
    $argomento = $_GET['arg'];
}

if (!isset($_GET['pag'])) {
    $_GET['pag'] = 1;
}
$pagina = $_GET['pag'];
$limite = 10;
$risEsatte = 0;
?>

<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/icon-quiz.png" type="image/x-icon">
    <title>Schede Quizify</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/index.css">
</head>


<body>
    <?php include './controller/header.php'; ?>
    <div class="center-schede mt-5">
        <h2 class="text mb-0 pt-3">SCHEDA N.<?php echo $pagina ?>
            <hr class="line">
        </h2>
    </div>
    <?php
    if (isset($_SESSION['email'])) {
        $id_utente = $_SESSION['id'];
        $offset = ($pagina - 1) * $limite;
        $query =    "SELECT risposte.ID AS id_risposta, domande.testo AS testo_domanda, risposte.`risposta-data`, risposte.data, domande.`risposta-esatta`, risposte.ID_utente 
                    FROM risposte 
                    INNER JOIN domande ON risposte.argomento = domande.argomento AND risposte.`n-domanda` = domande.`n-domanda` 
                    WHERE domande.argomento = '$argomento' AND risposte.ID_utente = '$id_utente' ORDER BY `id_risposta` ASC LIMIT $limite OFFSET $offset;";
        $tab_risposte = mysqli_query($conn, $query) or die("Errore query 1!");
        $num_risposte = mysqli_num_rows($tab_risposte);

        if ($num_risposte != 0) {
            for ($i = 0; $i < $num_risposte; $i++) {
                $risposte = mysqli_fetch_array($tab_risposte);
        ?>
                <div class="center-schede">
                    <div class="card-schede">
                        <h5><?php echo $risposte['testo_domanda'] ?></h5>
                        <div class="risposta">
                            <p class="btnScheda <?php echo $risposte['risposta-esatta'] == 'V' ? 'correct' : ''; ?> <?php echo $risposte['risposta-data'] == 'V' ? 'user-response' : ''; ?>">V</p>
                            <p class="btnScheda <?php echo $risposte['risposta-esatta'] == 'F' ? 'correct' : ''; ?> <?php echo $risposte['risposta-data'] == 'F' ? 'user-response' : ''; ?>">F</p>
    
                            <?php
                            if ($risposte['risposta-data'] == $risposte['risposta-esatta']) {
                                $risEsatte += 1;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            <div class="center-schede mb-5">
                <h3 class="text pb-3">Punteggio scheda: <?php echo $risEsatte ?> / <?php echo $num_risposte ?></h3>
            </div>
        <?php
        } else {
            ?>
            <div class="alert alert-danger my-alert" role="alert">
                <h3 class="alert-heading">ERRORE!</h3>
                <hr>
                <h6>Non risulta nessuna scheda!</h6>
            </div>
        <?php
        }

    } else {
    ?>
        <div class="alert alert-danger my-alert" role="alert">
            <h3 class="alert-heading">ERRORE!</h3>
            <hr>
            <h6>Nessun risultato!</h6>
        </div>
    <?php
    }
    ?>
    <?php
    $pagina_precedente = $pagina > 1 ? $pagina - 1 : 1;
    $pagina_successiva = $pagina + 1;
    ?>
    <nav>
        <ul class="pagination">
            <li class="page-item"><a class="page-link" id="page-pre" href="./scheda.php?arg=<?php echo $argomento ?>&pag=<?php echo $pagina_precedente; ?>">Scheda precedente</a></li>
            <li class="page-item"><a class="page-link" id="page-suc" href="./scheda.php?arg=<?php echo $argomento ?>&pag=<?php echo $pagina_successiva; ?>">Scheda successiva</a></li>
        </ul>
    </nav>
</body>

</html>
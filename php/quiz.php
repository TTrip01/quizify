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
    <title>Test Quizify</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/index.css">
</head>

<?php
if (!isset($_GET['arg'])) {
    header("location: ./homepage.php");
    exit;
} else {
    $argomento = $_GET['arg'];
}

if (!isset($_GET['nDomanda'])) {
    header("location: ./quiz.php?arg=$argomento&nDomanda=1");
}

$c = $_GET['nDomanda'];


$c -= 1;
$query = "SELECT * FROM `domande` WHERE `argomento` = '$argomento' LIMIT 1 OFFSET $c";
$c += 1;

$tab_domanda = mysqli_query($conn, $query) or die("Errore query 1!");
$num_domanda = mysqli_num_rows($tab_domanda);
?>

<body>
    <?php include './controller/header.php'; ?>

    <?php
    if ($num_domanda != 0 && isset($_SESSION['email'])) {
        for ($i = 0; $i < $num_domanda; $i++) {
            $domanda = mysqli_fetch_array($tab_domanda);

    ?>
            <div class="center">
                <?php
                if (!isset($_GET['error'])) {
                ?>
                    <form id="checkForm" action="./controller/verifica.php?arg=<?php echo $argomento ?>&nDomanda=<?php echo $domanda['n-domanda'] ?>" method="post">
                        <h4><?php echo $domanda['testo'] ?></h4>
                        <div class="risposta">
                            <input type="radio" class="btn-check" value="V" name="risposta" id="option5" autocomplete="off">
                            <label class="btn" for="option5">V</label>

                            <input type="radio" class="btn-check" value="F" name="risposta" id="option6" autocomplete="off">
                            <label class="btn" for="option6">F</label>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button id="confirm-button" class="succ" disabled>Conferma Risposta <img src="../img/icon-freccia.png" class="grayscale" id="confirm-img"></button>
                        </div>
                    </form>
                <?php
                } else {
                    $domanda['n-domanda'] += 1
                ?>
                    <form id="checkForm" action="./quiz.php?arg=<?php echo $argomento ?>&nDomanda=<?php echo $domanda['n-domanda'] ?>" method="post">
                        <h4><?php echo $domanda['testo'] ?></h4>
                        <div class="risposta">
                            <input type="radio" class="btn-check" value="V" name="risposta" id="option5" autocomplete="off" disabled>
                            <label class="btn" for="option5">V</label>

                            <input type="radio" class="btn-check" value="F" name="risposta" id="option6" autocomplete="off" disabled>
                            <label class="btn" for="option6">F</label>
                        </div>
                        <div class="alert alert-danger text-center" role="alert">
                            Risposta sbagliata !!!!!
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="succ">Prossima domanda <img src="../img/icon-freccia.png"></button>
                        </div>
                    </form>
            </div>
    <?php
                }
            }
        } elseif (!isset($_SESSION['email'])) {
    ?>
    <div class="alert alert-danger my-alert" role="alert">
        <h3 class="alert-heading">ERRORE!</h3>
        <hr>
        <h6>Prima di poter rispondere al quiz devi essere registrato.</h6>
    </div>
<?php
        } elseif ($num_domanda <= 0) {
?>
    <div class="container">
        <div class="popup col mb-3">
            <p>Hai completato il quiz con successo! I tuoi risultati sono stati inviati correttamente. <br> Per visualizzare il risultato finale puoi andare nella tua area utente.</p>
            <a href="./homepage.php"><button class="btn-popup">Torna alla homepage</button></a>
            <a href="./user-area.php"><button class="btn-popup">Area Utente</button></a>
        </div>
        <div class="popup col">
            <p>Vuoi ritentare il quiz?</p>
            <a href="./quiz.php?arg=<?php echo $argomento ?>&nDomanda=1"><button class="btn-popup">Ritenta</button></a>
        </div>
    </div>
<?php
        }
?>


<script>
    const radioButtons = document.querySelectorAll('input[name="risposta"]');
    const confirmButton = document.getElementById('confirm-button');
    const buttonImage = document.getElementById('confirm-img');

    radioButtons.forEach((radio) => {
        radio.addEventListener('change', () => {
            confirmButton.disabled = false;
            buttonImage.classList.remove('grayscale');
        });
    });
</script>

</body>

</html>
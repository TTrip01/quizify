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
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>
    <?php include './controller/header.php'; ?>

    <div class="container-card d-flex">
        <?php
        $query = "SELECT * FROM `card-quiz`";
        $tab_card = mysqli_query($conn, $query) or die("Errore query 1!");
        $num_card = mysqli_num_rows($tab_card);

        ?>
        <div class="row">
            <?php
            for ($i = 0; $i < $num_card; $i++) {
                $card = mysqli_fetch_array($tab_card);
            ?>
                <div class="card px-0">
                    <?php
                    if (isset($_SESSION['email'])) {
                        $id_utente = $_SESSION['id'];
                        $argomento = $card['nome'];
                        $queryContinua = "SELECT * FROM `risposte` WHERE ID_utente = '$id_utente' AND argomento = '$argomento' ORDER BY `ID` DESC LIMIT 1";
                        $tabContinua = mysqli_query($conn, $queryContinua) or die("Errore query 1!");
                        $numContinua = mysqli_num_rows($tabContinua);
                    }
                    if (isset($numContinua) && $numContinua != 0) {
                        $continua = mysqli_fetch_array($tabContinua);
                        $ultimaRis = $continua['n-domanda'];
                        $ultimaRis += 1;
                    ?>
                        <a href="./quiz.php?arg=<?php echo $card['nome'] ?>&nDomanda=<?php echo $ultimaRis ?>">
                        <?php
                    } else {
                        $ultimaRis = 0;
                        ?>
                            <a href="./quiz.php?arg=<?php echo $card['nome'] ?>&nDomanda=1">
                            <?php
                        }
                            ?>
                            <h5 class="card-title"><?php echo $card['nome'] ?></h5>
                            <img class="card-img img-fluid" src="<?php echo $card['img'] ?>">
                            <div class="card-img-overlay d-flex flex-column">
                                <div class="mt-auto">
                                    <?php
                                    if ($ultimaRis != 0) {
                                        $ultimaRis -= 1;
                                        $percentuale = ($ultimaRis / 10) * 100;
                                    ?>
                                        <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="<?php echo $percentuale ?>" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar bg-primary text-dark progress-bar-striped progress-bar-animated" style="width: <?php echo $percentuale ?>%"><?php echo $percentuale ?>%</div>
                                        </div>
                                    <?php
                                    }

                                    ?>
                                </div>
                            </div>
                            </a>
                </div>
            <?php
            }
            ?>
        </div>


</body>
<?php // include './controller/footer.php';
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>
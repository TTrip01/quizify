<div class="header">
    <a href="./homepage.php">
        <div class="logo">
            <img src="../img/icon-quiz.png">
            <p>QUIZIFY</p>
        </div>
    </a>
    <div class="profile">
        <p>
            <?php
            if (isset($_SESSION['nome']) && isset($_SESSION['cognome'])) {
            ?>
                <a href="user-area.php">
                    <img src="https://static.vecteezy.com/ti/vettori-gratis/t1/2534006-social-media-chat-online-immagine-profilo-vuoto-icona-testa-e-corpo-persone-in-piedi-icona-sfondo-grigio-gratuito-vettoriale.jpg">
                &nbsp
                <?php
                $nome = $_SESSION["nome"];
                $cognome = $_SESSION["cognome"];
                echo $nome . " " . $cognome;
                ?>
                </a>
                &nbsp | &nbsp
                <a class="btn btn-danger p-1 px-2" href="./controller/logout.php?logout=true">Logout</a>
        </p>

    <?php
            } else {
    ?>
        <a href="./login.php">Login concorrente</a><br>
        <a href="./sing-in.php">Registrati per partecipare</a>
    <?php
            }
    ?>
    </div>
</div>
<?php
include './conn.php';
$conn = conn();

session_start();
if (isset($_GET['nDomanda']) && isset($_POST['risposta']) && isset($_GET['arg'])) {
    $domanda = $_GET['nDomanda'];
    $argomento = $_GET['arg'];
    $risposta = $_POST['risposta'];
    $id_utente = $_SESSION['id'];

    $query = "SELECT * FROM domande WHERE ID = '$domanda'";
    $tab_domanda = mysqli_query($conn, $query) or die("Errore query 1!");
    $num_domanda = mysqli_num_rows($tab_domanda);

    if ($num_domanda > 0) {
        $query1 = "INSERT INTO `risposte` (`ID`, `argomento`, `n-domanda`, `risposta-data`, `data`, `ID_utente`) VALUES (NULL, '$argomento', '$domanda', '$risposta', current_timestamp(), '$id_utente');";
        mysqli_query($conn, $query1) or die("Errore query 1!");

        $domanda = mysqli_fetch_array($tab_domanda);
        if ($domanda['risposta-esatta'] === $risposta) {
?>
            <script>
                // Recupera l'URL della pagina precedente se presente, altrimenti usa la homepage del sito
                var previousPageUrl = document.referrer || 'http://localhost/capolavoro/quiz/php/homepage.php';

                // Crea un oggetto URL dalla stringa dell'URL precedente
                var url = new URL(previousPageUrl);

                // Recupera il valore attuale del parametro nDomanda e lo converte in un numero intero
                var currentQuestionNumber = parseInt(url.searchParams.get('nDomanda'));

                // Incrementa il valore di nDomanda di 1
                var nextQuestionNumber = currentQuestionNumber + 1;

                // Imposta il nuovo valore di nDomanda 
                url.searchParams.set('nDomanda', nextQuestionNumber);

                // Reindirizza all'URL aggiornato
                window.location.href = url.toString();
            </script>
        <?php
        } else {
        ?>
            <script>
                // Recupera l'URL della pagina precedente
                var previousPageUrl = document.referrer;

                // Aggiungi dati aggiuntivi 
                var data = "error=true";
                var urlWithParams = previousPageUrl + "&" + data;

                // Reindirizza all'URL aggiornato
                window.location.href = urlWithParams;
            </script>
    <?php
        }
    } else {
        echo "errore! nessuna domanda trovata";
    }
} else {
    ?>
    <script>
        // Recupera l'URL della pagina precedente
        var previousPageUrl = document.referrer;

        // Aggiungi dati aggiuntivi 
        var data = "error=true";
        var urlWithParams = previousPageUrl + "&" + data;

        // Reindirizza all'URL aggiornato
        window.location.href = urlWithParams;
    </script>
<?php
}
?>
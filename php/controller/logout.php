<?php
session_start();

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
?>
    <script>
        window.history.back();
    </script>
<?php
    exit();
}
?>
<?php
    if (isset($_GET["logout"])&&$_GET["logout"]==0) {
        session_destroy();
        header('location: pageconnexion.php');
    }
?>
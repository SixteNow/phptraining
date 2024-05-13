<?php
    require_once "./bdconnect/bdconnect.php";
    $rech=$_bdd->prepare('SELECT u.photo AS ProfilePhoto, b.* 
                        FROM users u
                        INNER JOIN blog b ON u.pseudo = b.auteur 
                        ORDER BY b.idpost DESC LIMIT 10');
    $rech->execute();
    $result=$rech->fetchall();
?>
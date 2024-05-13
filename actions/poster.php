<?php
    session_start();
    require_once "../bdconnect/bdconnect.php";
    if (isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['contenu']) && !empty($_POST['contenu'])) {
        $titre = strip_tags($_POST['title']);
        $contenu = strip_tags($_POST['contenu']);
        
        $inscri=$_bdd->prepare('INSERT INTO blog(titre,contenu,date,auteur) VALUES(:titre,:contenu,NOW(),:auteur)');
        $table = array(':titre'=> $titre,':contenu'=>$contenu,':auteur'=>$_SESSION['pseudo']);
        $inscri->execute($table);
        header('location: ../index.php');        
    }else{
        header('location: ../publish.php?error');
    }
?>
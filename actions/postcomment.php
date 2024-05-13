<?php
    require_once "../bdconnect/bdconnect.php";
    session_start();
    $rech=$_bdd->prepare('INSERT INTO comments(id_post,pseudo,contenu) VALUES(:idpost,:pseudo,:contenu)');
    $table = array(':idpost'=> $_GET['postid'],':pseudo'=>$_SESSION['pseudo'],':contenu'=>strip_tags($_GET['comment']));
    $rech->execute($table);
    header('location: ../voirpost.php?id='.$_GET['postid'].'')
?>
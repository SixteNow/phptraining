<?php
    session_start();
    require_once "../bdconnect/bdconnect.php";
    if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['pass']) && !empty($_POST['pass'])) {
        $pseudo=$_POST['name'];
        $mdp=$_POST['pass'];
        $rech=$_bdd->prepare('SELECT * FROM users WHERE pseudo=:pseudo AND mdp=:mdp');
        $rech->execute(array('pseudo'=>$pseudo,'mdp'=>$mdp));
        $result=$rech->fetchall();
        if (count($result)>0) {
            foreach ($result as $row) {
                $_SESSION['id']=$row['id'];
                $_SESSION['nomprenom']=$row['nom'].' '.$row['prenom'];
                $_SESSION['nom']=$row['nom'];
                $_SESSION['prenoms']=$row['prenom'];
                $_SESSION['pseudo']=$row['pseudo'];
                $_SESSION['pass']=$row['mdp'];
                $_SESSION['photo']=$row['photo'];
                header('location: ../index.php');
                exit;
            }
        }else{
            header('location: ../pageconnexion.php?erreur=2');
            exit;
        }
    }else {
        header('location: ../pageconnexion.php?erreur=1');
    }
?>
<?php
    session_start();
    require_once "../bdconnect/bdconnect.php";
    if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['prenom']) && !empty($_POST['prenom']) && isset($_POST['pseudo']) && !empty($_POST['pseudo']) && isset($_POST['pass']) && !empty($_POST['pass'])) {
        $nom = $_POST['name'];
        $prenom = $_POST['prenom'];
        $pseudo = $_POST['pseudo'];
        $pass = $_POST['pass'];

        $rech=$_bdd->prepare('SELECT * FROM users WHERE pseudo=:pseudo');
        $rech->execute(array('pseudo'=>$pseudo));
        $result=$rech->fetchall();
        if (count($result)>0) {
            header('location: ../pageinscription.php?erreur=2');
            exit;
        }else{
            if ($_FILES['file']['error']==UPLOAD_ERR_NO_FILE) {
                $inscri=$_bdd->prepare('INSERT INTO users(pseudo,nom,prenom,mdp) VALUES(:pseudo,:nom,:prenom,:pass)');
                $table = array(':pseudo'=> $pseudo,':nom'=>$nom,':prenom'=>$prenom,':pass'=>$pass);
                $inscri->execute($table);
                $rechID=$_bdd->prepare('SELECT * FROM users WHERE pseudo=:pseudo');
                $rechID->execute(array('pseudo'=>$pseudo));
                $resultID=$rechID->fetchall();
                foreach ($resultID as $row) {
                    $_SESSION['id']=$row['id'];
                    $_SESSION['nomprenom']=$row['nom'].' '.$row['prenom'];
                    $_SESSION['nom']=$row['nom'];
                    $_SESSION['prenoms']=$row['prenom'];
                    $_SESSION['pseudo']=$row['pseudo'];
                    $_SESSION['pass']=$row['mdp'];
                    $_SESSION['photo']=$row['photo'];
                }
                header('location: ../index.php');
                exit;
            }elseif ($_FILES['file'] ['size']<=1000000) {
                $_infofichier=pathinfo($_FILES['file']['name']);
                $_extension= $_infofichier['extension'];
                $_extauto=array('jpg','jpeg','png');
                if (in_array($_extension, $_extauto))
                {
                    $destination = '../images/';
                    $nomFinal =date('dmYhi').'.'.$_extension;
                    move_uploaded_file($_FILES['file']['tmp_name'],$destination.$nomFinal);
                    $imageF = "./images/".$nomFinal;
                    $inscri=$_bdd->prepare('INSERT INTO users(pseudo,nom,prenom,mdp,photo) VALUES(:pseudo,:nom,:prenom,:pass,:photo)');
                    $table = array(':pseudo'=> $pseudo,':nom'=>$nom,':prenom'=>$prenom,':pass'=>$pass,':photo'=>$imageF);
                    $inscri->execute($table);
                    $rechID=$_bdd->prepare('SELECT * FROM users WHERE pseudo=:pseudo');
                    $rechID->execute(array('pseudo'=>$pseudo));
                    $resultID=$rechID->fetchall();
                    foreach ($resultID as $row) {
                        $_SESSION['id']=$row['id'];
                        $_SESSION['nomprenom']=$row['nom'].' '.$row['prenom'];
                        $_SESSION['nom']=$row['nom'];
                        $_SESSION['prenoms']=$row['prenom'];
                        $_SESSION['pseudo']=$row['pseudo'];
                        $_SESSION['pass']=$row['mdp'];
                        $_SESSION['photo']=$row['photo'];
                    }
                    header('location: ../index.php');
                    exit;
                }
            }else {
                header('location: ../pageinscription.php?erreur=4');
                exit;
            }
        }
    }else {
        header('location: ../pageinscription.php?erreur=1');
        exit;
    }
?>
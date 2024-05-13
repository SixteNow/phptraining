<?php
    session_start();
    if (!isset($_SESSION['id'])) {
        header('location: pageconnexion.php');
    }else if (isset($_GET['auteur'])) {
        require_once "./bdconnect/bdconnect.php";
        $newlink='<a href="index.php?logout=0"><li><button class="btn btn-danger">Se déconnecter</button></li></a>';
        $rech=$_bdd->prepare('SELECT * FROM blog WHERE auteur=:auteur');
        $rech->execute(array('auteur'=>$_GET['auteur']));
        $result=$rech->fetchall();
    }else {
        header('location: ./index.php');
        exit;
    }
    include "./inc/logout.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog-Post</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php include "./inc/navbar.php";?>
    <div class='container'>
        <h2 style='text-align:center;text-decoration:underline;'>Posts</h2>
        <?php
            if (count($result)>0) {
                foreach ($result as $row) {
                ?>
                    <div class="post" style="padding:5px;">
                        <h1><?php echo($row["titre"])?></h1>
                        <p><?php echo(substr($row["contenu"],0,100))?>...</p>
                        <a href="./voirpost.php?id=<?php echo ($row["idpost"]) ?>" style='text-align:right;display:block;'>Voir plus</a>
                        <button class="btn btn-success">Modifier</button>
                        <button class="btn btn-danger supp" id="<?php echo($row["idpost"])?>">Supprimer</button>
                    </div>
                <?php
                }
            }else {
                echo('<p>Pas de posts</p>');
            }
        ?>
        <div class="modal-suppr">
            <p>Confirmer la suppression?</p>
            <button class="btn btn-success conf">Modifier</button>
            <button class="btn btn-danger conf">Supprimer</button>
        </div>        
    </div>
    <?php include './inc/footer.php';?>
</body>
</html>
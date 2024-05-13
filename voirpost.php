<?php
    session_start();
    if (!isset($_SESSION['id'])) {
        header('location: pageconnexion.php');
    }else if (isset($_GET['id'])) {
        require_once "./bdconnect/bdconnect.php";
        $newlink='<a href="index.php?logout=0"><li><button class="btn btn-danger">Se déconnecter</button></li></a>';
        $rech=$_bdd->prepare('SELECT * FROM blog WHERE idpost=:idpost');
        $rech->execute(array('idpost'=>$_GET['id']));
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
        <div class="postaffiche">
        <?php
            if (count($result)>0) {
                foreach ($result as $row) {
                    echo('<h1>'.$row['titre'].'</h1>');
                    echo('<p>'.nl2br($row['contenu']).'</p>');
                }
            }
        ?>
        </div>
        <hr>
        <div class="postcomment">
            <div>
                <h4>Les commentaires précédents</h4>
                <?php
                    if (count($result)>0) {
                        $rechcommentaire=$_bdd->prepare('SELECT * FROM comments WHERE id_post=:idpost');
                        $rechcommentaire->execute(array('idpost'=>$_GET['id']));
                        $resultcom=$rechcommentaire->fetchall();
                        if (count($resultcom)>0) {
                            foreach ($resultcom as $rowcom) {
                                echo('<div class="post-comment"><p>'.nl2br($rowcom['contenu']).'</p><p>'.$rowcom['pseudo'].'</p></div>');
                            }
                        }else {
                            echo('<p>Pas de commentaire. Faites-en un!</p>');
                        }
                    }
                ?>
            </div><br><br>
            <div>
                <h5>Ajouter un commentaire</h5>
                <form action="./actions/postcomment.php" class="form-group">
                    <textarea name="comment" id="comment" placeholder='Taper votre commentaire ici' class="form-control"></textarea><br>
                    <input type="text" hidden value='<?php echo($_GET['id'])?>' name='postid'>
                    <button type="submit" class='btn btn-primary'>Commenter</button>
                </form>
            </div>
        </div>
        
    </div>
    <?php include './inc/footer.php';?>
</body>
</html>
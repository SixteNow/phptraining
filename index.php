<?php
    session_start();
    if (!isset($_SESSION['id'])) {
        header('location: pageconnexion.php');
    }else {
        $newlink='<a href="index.php?logout=0"><li><button class="btn btn-danger">Se déconnecter</button></li></a>';
    }
    include "./inc/logout.php";
    include "./actions/afficherposts.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php include "./inc/navbar.php";?>
    <div class='container'>
        <?php
            if (count($result)>0) {
                foreach ($result as $row) {
                ?>
                    <div class="post">
                        <h1><?php echo($row["titre"])?></h1>
                        <p><?php echo(substr($row["contenu"],0,100))?>...</p>
                        <a href="./voirpost.php?id=<?php echo ($row["idpost"]) ?>" style='text-align:right;display:block;'>Voir plus</a>
                        <div class="post-bottom">
                            <p><?php echo($row["date"])?></p>
                            <div class='user'>
                                <?php if($_SESSION['pseudo']!=$row['auteur']){$lien='href="profil.php?name='.$row["auteur"].'"';} else{$lien='href="profil.php"';}?>
                                <a  <?php echo $lien ?>?><p><?php echo($row["auteur"])?></p></a>
                                <img src="<?php echo($row["ProfilePhoto"])?>" alt="">
                            </div>
                        </div>
                    </div>
                <?php
                }
            }else {
                echo('<p>Pas de posts</p>');
            }
        ?>
    </div>
    <?php include './inc/footer.php';?>
</body>
</html>
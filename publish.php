<?php
    session_start();
    if (!isset($_SESSION['id'])) {
        header('location: pageconnexion.php');
    }else {
        $newlink='<a href="index.php?logout=0"><li><button class="btn btn-danger">Se déconnecter</button></li></a>';
    }
    include "./inc/logout.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poster sur le blog</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php include "./inc/navbar.php";?>
    <div class='container'>
        <form method="post" action="./actions/poster.php" class='form-group'>
            <label for="title">Titre</label>
            <input type="text" name='title' id='title' placeholder='Titre' class="form-control">
            <label for="contenu">Contenu</label>
            <textarea name='contenu' id='contenu' placeholder='Votre post' class="form-control"></textarea><br>
            <button type="submit" class="btn btn-primary">Poster</button><br><br>
            <?php if (isset($_GET['error'])){
                echo('<p class="error">Remplissez les champs</p>');
            }
            ?>
            <?php if (isset($erreur)) echo($erreur) ?>
        </form>
    </div>
    <?php include './inc/footer.php';?>
</body>
</html>
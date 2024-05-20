<?php
    if (isset($_GET['erreur']) && $_GET['erreur']==1) {
        $erreur='<p class="error">Veuillez renseigner les champs svp</p>';
    }elseif (isset($_GET['erreur']) && $_GET['erreur']==2) {
        $erreur='<p class="error">Cet utilisateur existe déjà</p>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connectez-vous</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php include "./inc/navbar.php";?>
    <div class='container'>
        <div class="row center-form">
            <div class="col-md-6">
                <form method="post" action="./actions/incription.php" class='form-group' enctype='multipart/form-data'>
                    <h3>Inscription</h3>
                    <label for="name">Nom</label>
                    <input type="text" name='name' id='name' placeholder="Nom" class="form-control">
                    <label for="prenom">Prénoms</label>
                    <input type="text" name='prenom' id='prenom' class="form-control" placeholder="Prenoms">
                    <label for="pseudo">Pseudo</label>
                    <input type="text" name='pseudo' id='pseudo' class="form-control" placeholder="Pseudo">
                    <label for="pass">Mot de passe</label>
                    <input type="password" name='pass' id='pass' class="form-control" placeholder="Mot de passe">
                    <label for="file">Choisissez votre photo de profil:</label>
                    <input type="file" name="file" id="file" class="form-control-file"><br>
                    <button type="submit" class="btn btn-primary">S'inscrire</button><br><br>
                    <?php if (isset($erreur)) echo($erreur) ?>
                    <a href="./pageconnexion.php">Vous avez déjà un compte? Connectez-vouz</a>
                </form>
            </div>
        </div>
    </div>
    <?php include './inc/footer.php';?>
</body>
</html>
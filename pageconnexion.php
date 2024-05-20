<?php
    if (isset($_GET['erreur']) && $_GET['erreur']==1) {
        $erreur='<p class="error">Veuillez renseigner les champs svp</p>';
    }elseif (isset($_GET['erreur']) && $_GET['erreur']==2) {
        $erreur='<p class="error">Pseudo inexistant ou mot de passe incorrect</p>';
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
                <h3>Connexion</h3>
                <form method="post" action="./actions/connexion.php" class='form-group'>
                    <label for="name">Pseudo</label>
                    <input type="text" name='name' id='name' placeholder='Pseudo' class="form-control">
                    <label for="pass">Mot de passe</label>
                    <input type="password" name='pass' id='pass' placeholder='Mot de passe' class="form-control"><br>
                    <button type="submit" class="btn btn-primary">Se connecter</button><br><br>
                    <?php if (isset($erreur)) echo($erreur) ?>
                    <a href="./pageinscription.php">Vous n'avez pas de compte? Inscrivez-vouz</a>
                </form>
            </div>
        </div>
    </div>
    <?php include './inc/footer.php';?>
</body>
</html>
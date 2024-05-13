<?php
    session_start();
    require_once "./bdconnect/bdconnect.php";
    if (!isset($_SESSION['id'])) {
        header('location: pageconnexion.php');
    }else if (!isset($_GET['name'])){
        $newlink='<a href="index.php?logout=0"><li><button class="btn btn-danger">Se déconnecter</button></li></a>';
        $nomprenom=$_SESSION['nomprenom'];
        $photo=$_SESSION['photo'];
        $rech=$_bdd->prepare('SELECT * FROM users WHERE id=:id');
        $rech->execute(array('id'=>$_SESSION['id']));
        $result=$rech->fetchall();
        if (count($result)>0) {
            foreach ($result as $row) {
                if ($row['bio']!=null) {
                    $bio=$row["bio"];
                }else {
                    $bio='Pas de bio';
                }
                
            }
        }
    }else {
        $rech=$_bdd->prepare('SELECT * FROM users WHERE pseudo=:pseudo');
        $rech->execute(array('pseudo'=>$_GET['name']));
        $result=$rech->fetchall();
        if (count($result)>0) {
            foreach ($result as $row) {
                $newlink='<a href="index.php?logout=0"><li><button class="btn btn-danger">Se déconnecter</button></li></a>';
                $nomprenom=$row['nom'].' '.$row['prenom'];
                $photo=$row['photo'];
                $bio=$row['bio'];
            }
        }
    }
    include "./inc/logout.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if (isset($_GET['name'])) {
                    echo('Profil-'.$_GET['name']);
                }else{
                    echo('Mon profil');
                } ?></title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php include "./inc/navbar.php";?>
    <div class='container'>
        <div class="row">
            <div class="col-md-4">
                <img src="<?php if ($photo==null) {
                   echo('./images/default');
                }else {
                    echo($photo);
                }?>" alt="Photo de profil" class="img-fluid">
            </div>
            <div class="col-md-8">
                <h2><?php echo($nomprenom); ?></h2><br>
                <h4><?php if(!isset($_GET['name'])) {echo "Ma bio";}else{echo "Bio";}?></h4>
                <p><?php echo(nl2br($bio)); ?></p>
                <?php if(!isset($_GET['name'])) echo "<button type='button' id='btnmodif'>Modifier les informations</button>"; ?>
                <br>
                <p><a href="./manageposts.php?auteur=<?php if(isset($_GET['name'])) {echo ($_GET['name']);}else{echo ($_SESSION['pseudo']);}?>"><?php if(!isset($_GET['name'])) {echo "Mes posts";}else{echo "Posts de l'utilisateur";}?></a></p>
            </div>
        </div>
        <div class='overlay'></div>
        <div class="hidden-form">
            <div class="row center-form">
                <div class="col-md-6">
                    <p id="close">x</p>
                    <form method="post" action="./actions/incription.php" class='form-group' enctype='multipart/form-data'>
                        <h3>Vos informations</h3>
                        <label for="name">Nom</label>
                        <input type="text" name='name' id='name' placeholder="Nom" class="form-control" value="<?php echo($_SESSION["nom"]) ?>">
                        <label for="prenom">Prénoms</label>
                        <input type="text" name='prenom' id='prenom' class="form-control" placeholder="Prenoms" value="<?php echo($_SESSION["prenoms"]) ?>">
                        <label for="pseudo">Pseudo</label>
                        <input type="text" name='pseudo' id='pseudo' class="form-control" placeholder="Pseudo" value="<?php echo($_SESSION["pseudo"]) ?>">
                        <label for="pass">Mot de passe</label>
                        <input type="text" name='pass' id='pass' class="form-control" placeholder="Mot de passe" value="<?php echo($_SESSION["pass"]) ?>">
                        <label for="bio">Votre bio</label>
                        <textarea name="bio" id="bio" placeholder="Bio" class="form-control"><?php echo($bio) ?></textarea><br>
                        <button type='button' class="btn btn-primary send" id='<?php echo $_SESSION['id']?>'>Modifier</button><br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include './inc/footer.php';?>
</body>
</html>
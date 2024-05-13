<header class="container-fluid">
        <div class="titre" >
            <h1>Blog entrainement</h1>
            <span>Le concept était intéressant</span>
        </div>
        <div class="liens">
            <nav>
                <img src="./images/menubtn.png" alt="no image" id='menubtn'>
                <ul>
                    <a href="index.php" id="<?php if (basename($_SERVER['PHP_SELF'])=='index.php') {
                        echo('active-link');
                    }?>"><li>Blog</li></a>
                    <a href="profil.php" id="<?php if (basename($_SERVER['PHP_SELF'])=='profil.php') {
                        echo('active-link');
                    }?>" style='display:<?php if((basename($_SERVER['PHP_SELF'])=='profil.php')&&(isset($_GET['name']))) echo('none') ?>'><li>Mon profil</li></a>
                    <a href="publish.php" id="<?php if (basename($_SERVER['PHP_SELF'])=='publish.php') {
                        echo('active-link');
                    }?>"><li>Publier un article</li></a>
                    <?php if(isset($newlink)) echo($newlink) ?>
                </ul>
            </nav>
        </div>
</header>
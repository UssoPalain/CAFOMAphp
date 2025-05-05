<?php
    if(isset($_GET['cookie-accept'])){
        setcookie('cookie-accept','true', time() + 3600); 
        header("Location: index.php");
    }
    require_once "outil/Securite.class.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css" type="text/css" media="screen" />
    <title>Menu</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php"><img style="width:20vw; height:auto" src="public/CAFOMA.png"/></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <!-- Présent tout le temps -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=tab">Formations</a>
            </li>
            <?php if(!Securite::isConnected()){ // si non connecté ?>
                <?php if(Securite::autoriserCookie()){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=compte">Créer un Compte</a>
                    </li>
                <?php } ?>
            <?php } ?>
            <?php if(Securite::isConnected()){ // si connecté ?>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=lireSelf">Mon Profil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=tabSelf">Formations Suivies</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=DLA">Télécharger L'Application</a>
            </li>
            <?php } ?>
            <?php if(Securite::verifAccessPard()){ // si Pard ?>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=creer">Créer Formation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=tabAdmin">Administrer Formation</a>
            </li>
            <?php } ?>
            <?php if(Securite::verifAccessAdmin()){ // si Admin ?>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=lireusers">Utilisateurs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=creeruser">Créer Utilisateurs</a>
            </li>
            <?php } ?>
            <?php if(Securite::autoriserCookie()){ ?>
                <?php if(!Securite::isConnected()){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=connexion">Connexion</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=deco">Deconnexion</a>
                    </li>
                <?php } ?>
            <?php } ?>
        </ul>
    </div>
    </nav>
    <h2><?php echo $titre ?></h2>
    <?php echo $content ?>
    
    <div class="container">
        <footer>
            <h6>Copyright - Tous droits réservés</h6>
            <p class="text-center">
                <a href="index.php?action=mentions-legales">Mentions légales</a>
                <a href="index.php?action=cookies">Cookies</a>
                <a href="index.php?action=donnees-personnelles">Données personnelles</a>
            </p>
        </footer>
    </div>
    
    <?php if(!isset($_COOKIE['cookie-accept'])){ ?>
    <div class="banniere">
        <div class="text-banniere">
            <p>
                Notre site utilise un cookies de session pour l'authentification et d'autres fonctions pour utiliser nos services.<br>
                Voire notre <a href="index.php?action=cookies">politique en matiére de cookie</a><br>
                Voire notre <a href="index.php?action=donnees-personnelles">politique relatif aux données personnelles</a>
            </p>
        </div>
        <div class="button-banniere">
            <a href="?cookie-accept">OK, j'accepte</a>
        </div>
    </div>
    <?php } ?>
</body>
</html>
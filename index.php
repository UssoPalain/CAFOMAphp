<?php
require_once "controleur/Controleur.php";
require_once "controleur/DocumentationControleur.php";
require_once "controleur/UserControleur.php";
require_once "controleur/InscriptionControleur.php";
require_once "outil/outils.php";
if (Securite::autoriserCookie()){
    session_start();
}
$Controleur = new Controleur;
$DocumentationControleur = new DocumentationControleur;
$UserControleur = new UserControleur;
$InscriptionControleur = new InscriptionControleur;
try{
    //Présent tout le temps
    if(empty($_GET['action'])){
        $Controleur->afficherAccueil();
    }
    elseif(isset($_GET['action'])) {
        if($_GET['action']=="tab"){
            $Controleur->afficherFormations();
        }
        elseif($_GET['action'] == 'DLA'){ 
                $Controleur->afficherDL();
        }
        elseif($_GET['action'] == 'lire'){ 
                $login = $_SESSION['login'];
                $idFormation = Securite::validerInputData($_GET['id']);
                $Controleur->afficherFormation($login,$idFormation);
        }
        elseif($_GET['action'] == 'mentions-legales'){ 
                require "vue/MentionLegale.php";
        }
        elseif($_GET['action'] == 'cookies'){ 
                require "vue/Cookies.php";
        }
        elseif($_GET['action'] == 'donnees-personnelles'){ 
                require "vue/DonneesPerso.php";
        }
        // Si Non Connecté
        elseif($_GET['action'] == 'compte'){ 
            if(!Securite::isConnected()){
                $UserControleur->creerCompte();
            }
            else {throw new Exception("Vous n'avez pas le droit d'accéder à cette page");}
        }
        elseif($_GET['action'] == 'valid-CreerUser'){
            if(!Securite::isConnected()){
                $UserControleur->creerValidationUser(Securite::validerInputData($_POST['login']), Securite::validerInputData($_POST['mdp']),
                Securite::validerInputData($_POST['role']),Securite::validerInputData($_POST['valide']),isset($_POST['mentions']),isset($_POST['perso']));
            }
            else {throw new Exception("Vous n'avez pas le droit d'accéder à cette page");}
        }
        elseif($_GET['action'] == 'connexion'){ 
            if(!Securite::isConnected()){
                $UserControleur->connexionCompte();
            }
            else {throw new Exception("Vous n'avez pas le droit d'accéder à cette page");}
        }
        elseif($_GET['action'] == 'connexion-validation'){ 
            if(!Securite::isConnected()){
                $login = Securite::validerInputData($_POST['login']);
                $mdp = Securite::validerInputData($_POST['mdp']);
                $UserControleur->loginValidation($login,$mdp);
            }
            else {throw new Exception("Vous n'avez pas le droit d'accéder à cette page");}
        }
        // Si Connecté
        elseif($_GET['action'] == 'deco'){
            if(Securite::isConnected()){
                $UserControleur->deconnexion();
            }
            else {throw new Exception("Vous n'avez pas le droit d'accéder à cette page");}
        }
        elseif($_GET['action'] == 'lireSelf'){
            if(Securite::isConnected()){
                $login = $_SESSION['login'];
                $UserControleur->afficherUser($login);
            }
            else {throw new Exception("Vous n'avez pas le droit d'accéder à cette page");}
        }
        elseif($_GET['action'] == 'tabSelf'){ 
            if(Securite::isConnected()){
                $login = $_SESSION['login'];
                $InscriptionControleur->afficherMesFormations($login);
            }
            else {throw new Exception("Vous n'avez pas le droit d'accéder à cette page");}
        }
        elseif($_GET['action'] == 'inscrire'){
            if(Securite::isConnected()){
                $login = $_SESSION['login'];
                $idFormation = Securite::validerInputData($_GET['id']);
                $InscriptionControleur->creerValidationInscription($login,$idFormation);
            }
            else {throw new Exception("Vous n'avez pas le droit d'accéder à cette page");}
        }
        elseif($_GET['action'] == 'deinscrire'){
            if(Securite::isConnected()){
                $login = $_SESSION['login'];
                $idFormation = Securite::validerInputData($_GET['id']);
                $InscriptionControleur->creerValidationDeinscription($login,$idFormation);
            }
            else {throw new Exception("Vous n'avez pas le droit d'accéder à cette page");}
        }
        // Si Etudiant
        
        // Si Partenaire
        elseif($_GET['action'] == 'suppr'){ 
            if(Securite::verifAccessPard()){
                $Controleur->supprimerFormation(Securite::validerInputData($_GET['id']));
            }
            else {throw new Exception("Vous n'avez pas le droit d'accéder à cette page");}
        }
        elseif($_GET['action'] == 'Docsuppr'){ 
            if(Securite::verifAccessPard()){
                $idFormation = Securite::validerInputData($_GET['idF']);
                //echo "idFormation".$idFormation;
                $idDocumentation = Securite::validerInputData($_GET['idD']);
                //echo " idDoc".$idDoc;
                $DocumentationControleur->supprimerDocumentation($idFormation,$idDocumentation);
            }
            else {throw new Exception("Vous n'avez pas le droit d'accéder à cette page");}
        }
        elseif($_GET['action'] == 'creer'){
            if(Securite::verifAccessPard()){
                $createur = $_SESSION['login'];
                $Controleur->creerFormation($createur);
            }
            else {throw new Exception("Vous n'avez pas le droit d'accéder à cette page");}
        }
        elseif($_GET['action'] == 'valid-creer'){
            if(Securite::verifAccessPard()){
                $Controleur->creerValidationFormation();
            }
            else {throw new Exception("Vous n'avez pas le droit d'accéder à cette page");}
        }
        elseif($_GET['action'] == 'ajouter'){
            if(Securite::verifAccessPard()){
                $idFormation = Securite::validerInputData($_GET['id']);
                //echo "idformation:".$idFormation;
                $DocumentationControleur->creerDocumentation($idFormation);
            }
            else {throw new Exception("Vous n'avez pas le droit d'accéder à cette page");}
        }
        elseif($_GET['action'] == 'valid-ajouter'){
            if(Securite::verifAccessPard()){
                $idf = Securite::validerInputData($_POST['idF']);
                //echo "test:".$_POST['idF']." ".$_POST['type'];
                $DocumentationControleur->creerValidationDocumentation($idf);
            }
            else {throw new Exception("Vous n'avez pas le droit d'accéder à cette page");}
        }
        elseif($_GET['action'] == 'tabAdmin'){
            if(Securite::verifAccessPard()){
                $createur = $_SESSION['login'];
                $Controleur->administrerFormations($createur);
            }
            else {throw new Exception("Vous n'avez pas le droit d'accéder à cette page");}
        }
        // Si Administrateur
        elseif($_GET['action'] == 'lireusers'){ 
            if(Securite::verifAccessAdmin()){
                $UserControleur->afficherUsers();
            }
            else {throw new Exception("Vous n'avez pas le droit d'accéder à cette page");}
        }
        elseif($_GET['action'] == 'lireuser'){ 
            if(Securite::verifAccessAdmin()){
                $login = Securite::validerInputData($_GET['login']);
                $UserControleur->afficherUser($login);
            }
            else {throw new Exception("Vous n'avez pas le droit d'accéder à cette page");}
        }
        elseif($_GET['action'] == 'suppruser'){ 
            if(Securite::verifAccessAdmin()){
                $login = Securite::validerInputData($_GET['login']);
                $InscriptionControleur->SupprimerAllInscription($login);
                $UserControleur->supprimerUser($login);
            }
            else {throw new Exception("Vous n'avez pas le droit d'accéder à cette page");}
        }
        elseif($_GET['action'] == 'creeruser'){ 
            if(Securite::verifAccessAdmin()){
                $UserControleur->creerUser();
            }
            else {throw new Exception("Vous n'avez pas le droit d'accéder à cette page");}
        }
        elseif($_GET['action'] == 'valid-ajouterUser'){
            if(Securite::verifAccessAdmin()){
                $UserControleur->creerValidationUser();
            }
            else {throw new Exception("Vous n'avez pas le droit d'accéder à cette page");}
        }
        else {
            //echo "La page n'existe pas";
            throw new Exception("La page n'existe pas");
        }
    }
    else {
        //echo "La page n'existe pas";
        throw new Exception("La page n'existe pas");
    }
}catch(Exception $e){
    $erreurMsg = $e->getMessage();
    require "vue/Error.view.php";
}
?>
<?php
require_once "./outil/outils.php";
require_once './outil/Securite.class.php';
require_once "./model/UserManager.php";

class UserControleur{
    private $userManager;


    public function __construct(){
        $this->userManager = new UserManager();
    }

    function creerCompte(){
        require "vue/FormulaireCreerCompte.php";
    }
    function connexionCompte(){
        require "vue/FormulaireConnexion.php";
    }
    function afficherUsers(){
        //if(Securite::verifAccessAdmin()){
            $tabUsers = $this->userManager->lireUsers();
            require "vue/AfficherUsers.php";
        //}
        //else throw new Exception("Vous n'avez pas le droit d'accéder à cette page");
    }
    function afficherUser($login){
        //echo "login:".$login;
        $user=$this->userManager->lireUserByLogin($login);
        require "vue/AfficherUser.php";
    }
    function supprimerUser($login){
        $this->userManager->supprimerUserBD($login);
        header("Location: index.php?action=lireusers");
    }
    
    function creerUser(){
        require "vue/FormulaireUser.php";
    }
    
    function creerValidationUser($login,$mdp,$role,$valide,$mentions,$perso){
        if(!$mentions || !$perso){
            $alert = "Vous devez valider les cases à cocher pour pouvoir créer un compte abonné"; 
            require "vue/FormulaireCreerCompte.php";
        }
        else {
        $hash = password_hash($mdp, PASSWORD_DEFAULT);
        $this->userManager->ajouterUserBd($login,$hash,$role,$valide);
        header("Location: index.php?action=connexion");
        }
    }

    function loginValidation($login,$mdp){
        if (!Securite::isConnected()) {
            if (isset($login) && !empty($login) && isset($mdp) && !empty($mdp)) {
                $mdpHash = $this->userManager->getMdpHashUser($login);
                $role = $this->userManager->getRoleUser($login);
                if (password_verify($mdp, $mdpHash)) {
                    $_SESSION['role'] = $role;
                    $_SESSION['login'] = $login;
                    //echo $_SESSION['role'];
                    //echo $_SESSION['login'];
                    header("Location: index.php");
                } else {
                    $alert = "Couple nom utilisateur/mot de passe invalide";
                    require "vue/FormulaireConnexion.php";
                }
            } else {
                $alert = "Saisir un nom d'utilisateur et un mot de passe";
                require "vue/FormulaireConnexion.php";
            }
        } else {
            header("Location: index.php");
        }
    }
    
    function deconnexion(){
        if(Securite::isConnected()){
            unset($_SESSION['role']);
            unset($_SESSION['login']);
            //echo $_SESSION['role'];
            //echo $_SESSION['nom'];
            header("Location: index.php");
        }
        else {
            throw new Exception("Vous n'êtes pas connecté, vous ne pouvez vous délogger");
        }
    }
}
?>
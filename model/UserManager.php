<?php
    require_once "connexion.php";
    require_once "User.class.php";
    require_once "outil/outils.php";

class UserManager extends Connexion {

    function lireUsers(){
        $stmt = $this->getBdd()->prepare("SELECT * FROM user");
        $stmt->execute();
        $bddusers = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        foreach($bddusers as $user){
            $l=new User($user['login'], $user['mdp'], $user['role'], $user['valide']);
            $userTab[]=$l;
        }
        return $userTab;
    }
    
    function lireUserByLogin($login){
        $stmt = $this->getBdd()->prepare("SELECT * FROM user WHERE login=:login");
        $stmt->bindValue(":login",$login,PDO::PARAM_STR);
        $cpt = $stmt->execute();
        $bdduser = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();  
        $l=new User($bdduser['login'], $bdduser['mdp'], $bdduser['role'], $bdduser['valide']);
        //afficherTableau($l, "user");
        return $l;
    }
    
    function supprimerUserBD($login){
        //echo "login:".$login;
        $pdo = $this->getBdd();
        $req = "Delete from user where login = :login";
        $stmt = $pdo->prepare($req);
        $stmt->bindValue(":login",$login,PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if($resultat > 0){
            echo "user supprimer login=".$login."<br>";
        }
    }

    function ajouterUserBd($login,$mdp,$role,$valide){
        $pdo = $this->getBdd();
        $req = "
        INSERT INTO user (login, mdp, role, valide)
        values (:login, :mdp, :role, :valide)";
        $stmt = $pdo->prepare($req);
        $stmt->bindValue(":login",$login,PDO::PARAM_STR);
        $stmt->bindValue(":mdp",$mdp,PDO::PARAM_STR);
        $stmt->bindValue(":role",$role,PDO::PARAM_STR);
        $stmt->bindValue(":valide",$valide,PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if($resultat > 0){
            echo "formation insérer idFormation=".$pdo->lastInsertId()."<br>";
        }        
    }
    
    function getMdpHashUser($login){
        $pdo = $this->getBdd();
        $req = "SELECT mdp FROM user WHERE login=:login";
        $stmt = $pdo->prepare($req);
        $stmt->bindValue(":login",$login,PDO::PARAM_STR);
        $cpt = $stmt->execute();
        $mdp = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();  
        return $mdp['mdp'];
    }
    
    function getRoleUser($login){
        $pdo = $this->getBdd();
        $req = "SELECT role FROM user WHERE login=:login";
        $stmt = $pdo->prepare($req);
        $stmt->bindValue(":login",$login,PDO::PARAM_STR);
        $cpt = $stmt->execute();
        $role = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();  
        return $role['role'];
    }
    
}
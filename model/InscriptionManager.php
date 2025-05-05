<?php
    require_once "connexion.php";
    require_once "Inscription.class.php";
    require_once "outil/outils.php";

class InscriptionManager extends Connexion {

    function LireMesFormations($login){
        $stmt = $this->getBdd()->prepare("SELECT * FROM inscription WHERE login=:login");
        $stmt->bindValue(":login",$login,PDO::PARAM_STR);
        $cpt = $stmt->execute();
        $bddinscription = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();  
        $InscriptionTab=[];
        foreach($bddinscription as $inscriptions){
                $l=new Inscription($inscriptions['login'], $inscriptions['idFormation']);
                $InscriptionTab[]=$l;
        }
        return $InscriptionTab;
    }
    
    function EstIncrit($login,$idFormation){
        $stmt = $this->getBdd()->prepare("SELECT * FROM inscription WHERE login=:login AND idFormation=:idFormation");
        $stmt->bindValue(":login",$login,PDO::PARAM_STR);
        $stmt->bindValue(":idFormation",$idFormation,PDO::PARAM_STR);
        $cpt = $stmt->execute();
        $inscription = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();  
        $l = 0;
        if($inscription!=0){
            $l=1;
        }
        //echo $l;
        return $l;
    }
    
    function ajouterInscriptionBd($login,$idFormation){
        $pdo = $this->getBdd();
        $req = "
        INSERT INTO inscription (login, idFormation)
        values (:login, :idFormation)";
        $stmt = $pdo->prepare($req);
        $stmt->bindValue(":login",$login,PDO::PARAM_STR);
        $stmt->bindValue(":idFormation",$idFormation,PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if($resultat > 0){
            echo "formation insérer idFormation=".$pdo->lastInsertId()."<br>";
        }        
    }
    
    function supprimerInscriptionBd($login,$idFormation){
        $pdo = $this->getBdd();
        $req = "Delete from inscription where login = :login AND idFormation = :idFormation";
        $stmt = $pdo->prepare($req);
        $stmt->bindValue(":login",$login,PDO::PARAM_INT);
        $stmt->bindValue(":idFormation",$idFormation,PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if($resultat > 0){
            echo "livre supprimer id=".$idFormation."<br>";
        }      
    }
    
    function supprimerAllInscriptionBd($login){
        echo $login;
        $pdo = $this->getBdd();
        $req = "Delete from inscription where login = :login";
        $stmt = $pdo->prepare($req);
        $stmt->bindValue(":login",$login,PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if($resultat > 0){
            echo "livre supprimer id=".$login."<br>";
        }      
    }
    
}
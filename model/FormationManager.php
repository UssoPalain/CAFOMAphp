<?php
    require_once "connexion.php";
    require_once "Formation.class.php";
    require_once "outil/outils.php";

class FormationManager extends Connexion {
    function lireFormations(){
        $stmt = $this->getBdd()->prepare("SELECT * FROM formation");
        $stmt->execute();
        $bddformations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //afficherTableau($bddformations,"formations");
        $stmt->closeCursor();
        //$formations=[];
        foreach($bddformations as $formations){
            $l=new Formation($formations['idFormation'], $formations['nom'], $formations['description'], $formations['age'], $formations['niveau'], $formations['image'], $formations['createur']);
            $formationTab[]=$l;
            //afficherTableau($l,"foreach");
        }
        //afficherTableau($formationTab,"objets");
        return $formationTab;
    }

    function ajouterFormationBd($nom,$description,$age,$niveau,$image,$createur){
        $pdo = $this->getBdd();
        $req = "
        INSERT INTO formation (nom, description, age, niveau, image, createur)
        values (:nom, :description, :age, :niveau, :image, :createur)";
        $stmt = $pdo->prepare($req);
        $stmt->bindValue(":nom",$nom,PDO::PARAM_STR);
        $stmt->bindValue(":description",$description,PDO::PARAM_STR);
        $stmt->bindValue(":age",$age,PDO::PARAM_INT);
        $stmt->bindValue(":niveau",$niveau,PDO::PARAM_STR);
        $stmt->bindValue(":image",$image,PDO::PARAM_STR);
        $stmt->bindValue(":createur",$createur,PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if($resultat > 0){
            echo "formation insérer idFormation=".$pdo->lastInsertId()."<br>";
        }        
    }
    
    function lireFormationById($idFormation){
        $stmt = $this->getBdd()->prepare("SELECT * FROM formation WHERE idFormation=:idFormation");
        $stmt->bindValue(":idFormation",$idFormation,PDO::PARAM_STR);
        $cpt = $stmt->execute();
        $formation = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();  
        $l=new Formation($formation['idFormation'], $formation['nom'], $formation['description'], $formation['age'], $formation['niveau'], $formation['image'], $formation['createur']);
        return $l;
    }
    function supprimerFormationBD($idFormation){
        $pdo = $this->getBdd();
        $req = "Delete from formation where idFormation = :idFormation";
        $stmt = $pdo->prepare($req);
        $stmt->bindValue(":idFormation",$idFormation,PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if($resultat > 0){
            echo "livre supprimer id=".$idFormation."<br>";
        }
    }
    function lireFormationByCreateur($createur){
        $stmt = $this->getBdd()->prepare("SELECT * FROM formation WHERE createur=:createur");
        $stmt->bindValue(":createur",$createur,PDO::PARAM_STR);
        $cpt = $stmt->execute();
        $bddformations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();  
        foreach($bddformations as $formations){
            $l=new Formation($formations['idFormation'], $formations['nom'], $formations['description'], $formations['age'], $formations['niveau'], $formations['image'], $formations['createur']);
            $formationTab[]=$l;
            //afficherTableau($l,"foreach");
        }return $formationTab;
    }
    
    function EstCreateur($idFormation,$createur){
        //echo $idFormation;
        //echo $createur;
        $stmt = $this->getBdd()->prepare("SELECT * FROM formation WHERE idFormation=:idFormation AND createur=:createur");
        $stmt->bindValue(":idFormation",$idFormation,PDO::PARAM_STR);
        $stmt->bindValue(":createur",$createur,PDO::PARAM_STR);
        $cpt = $stmt->execute();
        $creation = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();  
        $l = 0;
        if($creation!=0){
            $l=1;
        }
        //echo $l;
        return $l;
    }
}
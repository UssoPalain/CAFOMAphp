<?php
    require_once "connexion.php";
    require_once "Documentation.class.php";
    require_once "outil/outils.php";

class DocumentationManager extends Connexion {

    function lireDocumentations(){
        $stmt = $this->getBdd()->prepare("SELECT * FROM documentation");
        $stmt->execute();
        $bdddocumentations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //afficherTableau($bddformations,"documentations");
        $stmt->closeCursor();
        foreach($bdddocumentations as $documentation){
            $l=new Documentation($documentation['idDocumentation'], $documentation['idFormation'], $documentation['titre'], $documentation['type']);
            $documentationTab[]=$l;
            //afficherTableau($l,"foreach");
        }
        //afficherTableau($formationTab,"objets");
        return $documentationTab;
    }

    function ajouterDocumentationBd($idFormation,$idDocumentation,$type,$titre){
        //echo "ajouterDocumentationBd: idFormation - ".$idFormation." type:".$type." titre:".$titre;
        $pdo = $this->getBdd();
        $req = "
        INSERT INTO documentation (idFormation ,idDocumentation, type, titre)
        values (:idFormation, :idDocumentation, :type, :titre)";
        $stmt = $pdo->prepare($req);
        $stmt->bindValue(":idFormation",$idFormation,PDO::PARAM_STR);
        $stmt->bindValue(":idDocumentation",$idDocumentation,PDO::PARAM_STR);
        $stmt->bindValue(":type",$type,PDO::PARAM_STR);
        $stmt->bindValue(":titre",$titre,PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if($resultat > 0){
            echo "formation insérer idFormation=".$pdo->lastInsertId()."<br>";
        }        
    }
    
    function lireDocumentationById($idFormation){
        $stmt = $this->getBdd()->prepare("SELECT * FROM documentation WHERE idFormation=:idFormation");
        $stmt->bindValue(":idFormation",$idFormation,PDO::PARAM_STR);
        $cpt = $stmt->execute();
        $bdddocumentation = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //afficherTableau($bdddocumentation, "documentations");
        $stmt->closeCursor();  
        $documentationTab=[];
        foreach($bdddocumentation as $documentation){
            $l=new Documentation($documentation['idDocumentation'], $documentation['idFormation'], $documentation['titre'], $documentation['type']);
            $documentationTab[]=$l;
            //afficherTableau($l,"foreach");
        }
        //afficherTableau($l, "foreach");
        return $documentationTab;
    }
    
    function supprimerDocumentationBD($idFormation,$idDocumentation){
        $pdo = $this->getBdd();
        $req = "Delete from documentation where idFormation = :idFormation AND idDocumentation = :idDocumentation";
        $stmt = $pdo->prepare($req);
        $stmt->bindValue(":idFormation",$idFormation,PDO::PARAM_INT);
        $stmt->bindValue(":idDocumentation",$idDocumentation,PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if($resultat > 0){
            echo "livre supprimer id=".$idFormation."<br>";
        }
    }
    
    function supprimerAllDocumentationBD($idFormation){
        $pdo = $this->getBdd();
        $req = "Delete from documentation where idFormation = :idFormation";
        $stmt = $pdo->prepare($req);
        $stmt->bindValue(":idFormation",$idFormation,PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if($resultat > 0){
            echo "livre supprimer id=".$idFormation."<br>";
        }
    }
    
    function getMaxNumberDocumentation ($idFormation){
        //echo "idFormation".$idFormation;
        $pdo = $this->getBdd();
        $req = "SELECT MAX(idDocumentation) AS numMax FROM documentation WHERE idFormation = :idFormation";
        $stmt = $pdo->prepare($req);
        $stmt->bindValue(":idFormation",$idFormation,PDO::PARAM_INT);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        //afficherTableau($resultat, "resultat");
        return $resultat['numMax'] + 1;
    }
    
}
<?php
require_once "./outil/outils.php";
require_once "./model/FormationManager.php";
require_once "./model/DocumentationManager.php";
require_once "./model/InscriptionManager.php";
require_once "./model/UserManager.php";

class RestControleur{
    private $formationManager;
    private $documentationManager;
    private $inscriptionManager;
    private $UserManager;

    public function __construct(){
        $this->formationManager = new FormationManager();
        $this->documentationManager = new DocumentationManager();
        $this->inscriptionManager = new InscriptionManager();
        $this->UserManager = new UserManager();
    }
    
    function getAllFormations(){
        return $this->formationManager->lireFormations();
    }
    
    function getFormationById($idFormation){
        return $this->formationManager->lireFormationById($idFormation);
    }
    
    function getMyFormations($login){
        return $this->inscriptionManager->LireMesFormations($login);
    }    
    
    function getDocumentationByFormation($idFormation){
        return $this->documentationManager->lireDocumentationById($idFormation);
    }
    
    function getUserByLogin($login){
        return $this->UserManager->lireUserByLogin($login);
    }
}
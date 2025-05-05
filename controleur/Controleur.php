<?php
require_once "./outil/outils.php";
require_once "./model/FormationManager.php";
require_once "./model/DocumentationManager.php";

class Controleur{
    private $formationManager;
    private $documentationManager;
    private $inscriptionManager;


    public function __construct(){
        $this->formationManager = new FormationManager();
        $this->documentationManager = new DocumentationManager();
        $this->inscriptionManager = new InscriptionManager();
    }
    
    public function afficherAccueil(){
        require "vue/Accueil.php";
    }
    public function afficherDL(){
        require "vue/DLAndroid.php";
    }
    function afficherFormations(){
        $tabFormations=$this->formationManager->lireFormations();
        //echo "afficherFormations:".$tabFormations;
        require "vue/AfficherFormations.php";
    }
    function afficherFormation($login,$idFormation){
        $formation=$this->formationManager->lireFormationById($idFormation);
        $tabDocumentations=$this->documentationManager->lireDocumentationById($idFormation);
        $inscrit=$this->inscriptionManager->EstIncrit($login,$idFormation);
        $ACree=$this->formationManager->EstCreateur($idFormation,$login);
        require "vue/AfficherFormation.php";
    }
    function supprimerFormation($idFormation){
        $this->documentationManager->supprimerAllDocumentationBD($idFormation);
        $this->formationManager->supprimerFormationBD($idFormation);
        header("Location: index.php?action=tab");
    }
    function creerFormation($createur){
        require "vue/FormulaireFormation.php";
    }
    function creerValidationFormation(){
        $file = $_FILES['image'];
        $repertoire = "public/images/";
        $nomImageAjoute = ajouterImage($file,$repertoire);
        $this->formationManager->ajouterFormationBd($_POST['titre'],$_POST['descr'],$_POST['age'],$_POST['niveau'],$nomImageAjoute,$_POST['createur']);
        header("Location: index.php?action=tab");
    }
    function administrerFormations($createur){
        if(Securite::verifAccessAdmin()){
            $tabFormations=$this->formationManager->lireFormations();
            require "vue/AfficherAdministrerFormation.php";
        } else {
        $tabFormations=$this->formationManager->lireFormationByCreateur($createur);
        require "vue/AfficherAdministrerFormation.php";
        }
    }
}
?>
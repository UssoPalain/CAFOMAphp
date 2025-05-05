<?php
require_once "./outil/outils.php";
require_once "./model/InscriptionManager.php";
require_once "./model/FormationManager.php";

class InscriptionControleur{
    private $inscriptionManager;
    private $formationManager;


    public function __construct(){
        $this->inscriptionManager = new InscriptionManager();
        $this->formationManager = new FormationManager();
    }
    
    public function afficherMesFormations($login) {
        $InscriptionTab = $this->inscriptionManager->LireMesFormations($login);
        $tabFormations = [];
        foreach($InscriptionTab as $inscription){
            $formation = $this->formationManager->lireFormationById($inscription->getIdFormation());
            $tabFormations[] = $formation;
            //afficherTableau($formation, "afficherMesFormations");
        }
        
        require "vue/AfficherMesFormations.php";
    }
    
    function creerValidationInscription($login,$idFormation){
        $this->inscriptionManager->ajouterInscriptionBd($login,$idFormation);
        header("Location: index.php?action=tabSelf");
    }
    
    function creerValidationDeinscription($login,$idFormation){
        $this->inscriptionManager->supprimerInscriptionBd($login,$idFormation);
        header("Location: index.php?action=tabSelf");
    }
    
    function SupprimerAllInscription($login){
        $this->inscriptionManager->supprimerAllInscriptionBd($login);
        //header("Location: index.php?action=tabSelf");
    }
    
    /*
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
    function afficherFormation($idFormation){
        $formation=$this->formationManager->lireFormationById($idFormation);
        $tabDocumentations=$this->documentationManager->lireDocumentationById($idFormation);
        require "vue/AfficherFormation.php";
    }
    function supprimerFormation($idFormation){
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
    */
}
?>
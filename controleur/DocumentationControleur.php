<?php
require_once "./outil/outils.php";
require_once "./model/DocumentationManager.php";

class DocumentationControleur{
    private $documentationManager;
    

    public function __construct(){
        $this->documentationManager = new DocumentationManager();
    }
    
    function supprimerDocumentation($idFormation,$idDocumentation){
        $this->documentationManager->supprimerDocumentationBD($idFormation,$idDocumentation);
        header("Location: index.php?action=lire&id=".$idFormation);
    }
    function supprimerAllDocumentation($idFormation){
        $this->documentationManager->supprimerAllDocumentationBD($idFormation);
        //header("Location: index.php?action=lire&id=".$idFormation);
    }
    function creerDocumentation($idFormation){
        require "vue/FormulaireDocumentation.php";
    }
    function creerValidationDocumentation($idf){
        //echo "idf:".$idf;
        $file = $_FILES['titre'];
        $repertoire = "public/documentation/";
        $nomDocAjoute = ajouterImage($file,$repertoire);
        $val = $this->documentationManager->getMaxNumberDocumentation($idf);
        //echo "val:".$val;
        $this->documentationManager->ajouterDocumentationBd($_POST['idF'],$val,$_POST['type'],$nomDocAjoute);
        header("Location: index.php?action=lire&id=".$idf);
    }
}
?>
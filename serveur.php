<?php
include "model/connexion.php";
include "outil/outils.php";
include "model/Documentation.class.php";
include "model/Formation.class.php";
include "model/Inscription.class.php";
include "model/User.class.php";
require_once "controleur/RestControleur.php";

if(isset($_GET["action"])){
    $RestControleur = new RestControleur();
    
    if($_GET["action"]=='allFormations'){
            $TabFormations = $RestControleur->getAllFormations();
            print("allFormations#");
            print(json_encode($TabFormations));
    }
    else if($_GET["action"]=="FormationByID"){
            $idFormation = $_GET["id"];
            $TabFormations = $RestControleur->getFormationById($idFormation);
            print("Formation#");
            print(json_encode($TabFormations));
    }
    else if($_GET["action"]=="MyFormations"){
            $login = $_SESSION["login"];
            $TabFormations = $RestControleur->getMyFormations($login);
            print("MyFormations#");
            print(json_encode($TabFormations));
    }
    else if($_GET["action"]=="DocumentationByID"){
            $idFormation = $_GET["id"];
            $TabDocumentations = $RestControleur->getDocumentationByFormation($idFormation);
            print("Documentations#");
            print(json_encode($TabDocumentations));
    }
    else if($_GET["action"]=="UserByLogin"){
            $login = $_SESSION["login"];
            $TabUsers = $RestControleur->getUserByLogin($login);
            print("formation#");
            print(json_encode($TabUsers));
    }
}
<?php 
  require_once "../outil/outils.php"; 
  require_once "FormationManager.php"; 
  require_once "DocumentationManager.php";
  $tabFormations1 = array
        (
            "idFormation" => 1,
            "nom" => "BTS SIO SLAM",
            "description" => "Apprendre le Code Avancé",
            "age" => 17,
            "niveau" => "BAC",
            "image" => "Fire.jpg"
        );
  $tabFormations[]=$tabFormations1;
  $tabFormations2 = array
  (
      "idFormation" => 2,
      "nom" => "BTS SIO SISR",
      "description" => "Apprendre le Réseau",
      "age" => 17,
      "niveau" => "BAC",
      "image" => "Water.jpg"
  );
$tabFormations[]=$tabFormations2;
$tabFormations3 = array
(
    "idFormation" => 3,
    "nom" => "BAC Scientifique",
    "description" => "Diplome orienté Mathématiques",
    "age" => 14,
    "niveau" => "Brevet",
    "image" => "Stink.jpg"
);
$tabFormations[]=$tabFormations3;
$tabFormations4 = array
(
    "idFormation" => 4,
    "nom" => "BAC Litteraire",
    "description" => "Diplome orienté Langues",
    "age" => 14,
    "niveau" => "Brevet",
    "image" => "Death.jpg"
);
$tabFormations[]=$tabFormations4;
$tabFormations5 = array
(
    "idFormation" => 5,
    "nom" => "Brevet des Collèges",
    "description" => "Diplome Généraliste",
    "age" => 10,
    "niveau" => "Classe Préparatoire",
    "image" => "Sleep.jpg"
);
$tabFormations[]=$tabFormations5;
$tabFormations6 = array
(
    "idFormation" => 6,
    "nom" => "ISN",
    "description" => "Apprendre les Bases de la Programmation",
    "age" => 13,
    "niveau" => "Brevet",
    "image" => "Comet.jpg"
);
$tabFormations[]=$tabFormations6;
$tabFormations7 = array
(
    "idFormation" => 7,
    "nom" => "Mathématiques",
    "description" => "Apprendre le Monde des Chiffres et des Nombres",
    "age" => 4,
    "niveau" => "Aucun",
    "image" => "Curse.jpg"
);
$tabFormations[]=$tabFormations7;
$tabFormations8 = array
(
    "idFormation" => 8,
    "nom" => "Math Spé",
    "description" => "Approfondir les Mathématiques",
    "age" => 13,
    "niveau" => "Classe Preparatoire",
    "image" => "Snow.jpg"
);
$tabFormations[]=$tabFormations8;
$tabFormations9 = array
(
    "idFormation" => 9,
    "nom" => "Philosophie",
    "description" => "Club de Débat",
    "age" => 15,
    "niveau" => "Brevet",
    "image" => "Gaping.jpg"
);
$tabFormations[]=$tabFormations9;
$tabFormations10 = array
(
    "idFormation" => 10,
    "nom" => "Science et Vie de la Terre",
    "description" => "Apprendre Les Fonctions de la Vie",
    "age" => 9,
    "niveau" => "Brevet",
    "image" => "Dragon.jpg"
);
$tabFormations[]=$tabFormations10;
$tabFormations11 = array
(
    "idFormation" => 11,
    "nom" => "Physique",
    "description" => "Apprendre Comment la Physique Marche",
    "age" => 9,
    "niveau" => "Brevet",
    "image" => "Thorns.jpg"
);
$tabFormations[]=$tabFormations11;
$tabFormations12 = array
(
    "idFormation" => 12,
    "nom" => "Chimie",
    "description" => "Pipe Bomb",
    "age" => 9,
    "niveau" => "Pipe Bomb",
    "image" => "Black.jpg"
);
$tabFormations[]=$tabFormations12;

foreach($tabFormations as $formation){
    ajouterFormationBd($idFormation['idFormation'],$formation['nom'],$formation['description'],$formation['age'],$formation['niveau'],$formation['image']);
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$tabDocumentations1 = array
(
    "idDocumentation" => 1,
    "idFormation" => 1,
    "titre" => "Victim.mp4",
    "type" => "mp4",
);
$tabDocumentations[]=$tabDocumentations1;
$tabDocumentations2 = array
(
    "idDocumentation" => 1,
    "idFormation" => 1,
    "titre" => "Journey.mp3",
    "type" => "mp3",
);
$tabDocumentations[]=$tabDocumentations2;
$tabDocumentations3 = array
(
    "idDocumentation" => 1,
    "idFormation" => 1,
    "titre" => "Dahaad.png",
    "type" => "png",
);
$tabDocumentations[]=$tabDocumentations3;
$tabDocumentations4 = array
(
    "idDocumentation" => 1,
    "idFormation" => 1,
    "titre" => "Tomb.jpg",
    "type" => "jpg",
);
$tabDocumentations[]=$tabDocumentations4;
$tabDocumentations5 = array
(
    "idDocumentation" => 1,
    "idFormation" => 1,
    "titre" => "M2I.pdf",
    "type" => "pdf",
);
$tabDocumentations[]=$tabDocumentations5;

foreach($tabDocumentations as $documentation){
    ajouterDocumentationBd($documentation['idDocumentation'], $documentation['idFormation'], $documentation['titre'], $documentation['type']);
}
?>

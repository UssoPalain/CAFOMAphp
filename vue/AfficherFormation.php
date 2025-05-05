<?php ob_start()?>
<br>
<div class="row">
    <div class="col-4">
    <img  style="width:50%; height:auto" src="public/images/<?= $formation->getImage(); ?>">
    </div>
    <div class="col-8">
        <h3>Description :</h3> 
        <p><?= $formation->getDescription(); ?></p>
        <br>
        <h3>Age Minimum Requis : <?= $formation->getAge(); ?></h3>
        <br>
        <h3>Niveau Minimum Requis : <?= $formation->getNiveau(); ?></h3>
        <br>
        <h3>Créateur : <?= $formation->getCreateur(); ?></h3>
        <br>
    </div>
<?php if(Securite::isConnected()){ // si connecté ?>
    <div class="container">
        <?php if (count($tabDocumentations) != 0) { ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">idDocumentation</th>
                        <th scope="col">idFormation</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Type</th>
                        <?php if($inscrit == 1 or Securite::verifAccessPard()){ // si il est Inscrit ?>
                        <th scope="col" colspan="2">Actions</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                <?php foreach(/*(array)*/$tabDocumentations as $documentation) { ?>
                    <tr class="align-middle">
                        <td><?php echo $documentation->getIdDocumentation(); ?></td>
                        <td><?php echo $documentation->getIdFormation(); ?></td>
                        <td><?php echo $documentation->getTitre(); ?></td>
                        <td><?php echo $documentation->getType(); ?></td>
                        <?php if($inscrit == 1 or Securite::verifAccessPard()){ // si il est Inscrit ?>
                        <td><a href="public/documentation/<?= $documentation->getTitre(); ?>">Télécharger</a></td>
                        <?php if($ACree == 1 or Securite::verifAccessAdmin()){ // si proprietaire ?>
                        <td><a href="index.php?action=Docsuppr&idF=<?= $documentation->getIdFormation(); ?>&idD=<?= $documentation->getIdDocumentation(); ?>"">Supprimer</a></td>
                        <?php } ?>
                        <?php } ?>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        <?php } ?>
    </div>
<?php if($inscrit !== 1 and $ACree !== 1){ ?>
    <br>
    <a href="index.php?action=inscrire&id=<?= $formation->getIdFormation(); ?>">S'incrire a la Formation</a>
<?php } else{ ?>
    <br>
    <a href="index.php?action=deinscrire&id=<?= $formation->getIdFormation(); ?>">Se désincrire de la Formation</a>
<?php } ?>
<?php if($ACree == 1 or Securite::verifAccessAdmin()){ ?>
    <br>
    <a href="index.php?action=ajouter&id=<?= $formation->getIdFormation(); ?>">Ajouter Documentation</a>
<?php } ?>
<?php } ?>
<?php
$content = ob_get_clean();
$titre = $formation->getNom();
require "Template.php";
?>
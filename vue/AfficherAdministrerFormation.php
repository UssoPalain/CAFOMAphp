<?php ob_start()?>
<div class="container">
    <table class="table table-striped">
      <thead>
        <tr>
            <th scope="col">   </th>
            <th scope="col">Formation</th>
            <th scope="col">Description</th>
            <th scope="col">Age Minimum</th>
            <th scope="col">Niveau Requis</th>
            <th scope="col" colspan="3">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($tabFormations as $formation) { ?>
            <tr class="align-middle">
                <td><img width="80" src="public/images/<?php echo $formation->getImage(); ?>"></td>
                <td><?php echo $formation->getNom(); ?></td>
                <td><?php echo $formation->getDescription(); ?></td>
                <td><?php echo $formation->getAge(); ?></td>
                <td><?php echo $formation->getNiveau(); ?></td>
                <td><a href="index.php?action=lire&id=<?= $formation->getIdFormation(); ?>">Lire</a></td>
                <td><a href="#">Modifier</a></td>
                <td><a href="index.php?action=suppr&id=<?= $formation->getIdFormation(); ?>">Supprimer</a></td>
            </tr>
        <?php } ?>
      </tbody>
    </table> 
</div>
<?php
    $content=ob_get_clean();
    $titre = "Administrer ses Formations";
    require "template.php";
?>
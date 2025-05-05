<?php ob_start()?>
<div class="container">
    <table class="table table-striped">
      <thead>
        <tr>
            <th scope="col">login</th>
            <th scope="col">mdp</th>
            <th scope="col">role</th>
            <th scope="col">valide</th>
            <th scope="col" colspan="2">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($tabUsers as $user) { ?>
            <tr class="align-middle">
                <td><?php echo $user->getLogin(); ?></td>
                <td><?php echo $user->getMdp(); ?></td>
                <td><?php echo $user->getRole(); ?></td>
                <td><?php echo $user->getValide(); ?></td>
                <td><a href="index.php?action=lireuser&login=<?= $user->getLogin(); ?>">Lire</a></td>
                <td><a href="index.php?action=suppruser&login=<?= $user->getLogin(); ?>">Supprimer</a></td>
            </tr>
        <?php } ?>
      </tbody>
    </table> 
</div>
<?php
    $content=ob_get_clean();
    $titre = "Liste des Utilisateurs";
    require "template.php";
?>
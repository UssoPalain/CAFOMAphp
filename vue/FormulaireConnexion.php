<?php ob_start()?>
    <form method="POST" action="index.php?action=connexion-validation" enctype="multipart/form-data">
        Login : <input type="text" id="login" name="login"><br>
        MDP : <input type="text" id="mdp" name="mdp"><br>
    <input type="submit" value="connexion" name="form_ajouter"/>
    </form>

<?php
    $content=ob_get_clean();
    $titre = "Creer Nouveau Compte";
    require "template.php";
?>
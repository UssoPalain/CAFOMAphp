<?php ob_start()?>
    <form method="POST" action="index.php?action=valid-ajouterUser" enctype="multipart/form-data"> 
        login : <input type="text" id="login" name="login"><br>
        mdp : <input type="text" id="mdp" name="mdp"><br>
        Role : <select id="role" name="role"><br>
            <option value="admin">administrateur</option>
            <option value="pard">partenaire</option>
            <option value="etud">étudiant</option>
        </select><br>
        <input type="hidden" name="valide" value="1">
    <input type="submit" value="ajouter" name="form_ajouter"/>
</form>
<?php
    $content=ob_get_clean();
    $titre = "Ajouter Utilisateurs";
    require "template.php";
?>
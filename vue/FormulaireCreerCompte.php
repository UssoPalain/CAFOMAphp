<?php ob_start()?>
    <form method="POST" action="index.php?action=valid-CreerUser" enctype="multipart/form-data">
        Login : <input type="text" id="login" name="login"><br>
        MDP : <input type="text" id="mdp" name="mdp"><br>
        <input type="hidden" id="role" name="role" value="etud">
        <input type="hidden" name="valide" value="1">
        <div class="form-check">
                <input class="form-check-input" type="checkbox" name="mentions" id="flexCheckIndeterminate">
                <label class="form-check-label" for="flexCheckIndeterminate">
                  J'ai lu et j'accepte les conditions de service décrites dans les 
                  <a href="index.php?action=mentions-legales">mentions légales</a>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="perso" id="flexCheckIndeterminate">
                <label class="form-check-label" for="flexCheckIndeterminate">
                  J'accepte que mes données soient conservées pour avoir accés aux services de la bibliothéques 
                </label>
            </div>
    <input type="submit" value="ajouter" name="form_ajouter"/>
    </form>
<td><a href="index.php?action=connexion">Déja un Compte ?</a></td>

<?php
    $content=ob_get_clean();
    $titre = "Creer Nouveau Compte";
    require "template.php";
?>
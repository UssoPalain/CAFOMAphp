<?php ob_start()?>
    <form method="POST" action="index.php?action=valid-creer" enctype="multipart/form-data">
        Titre : <input type="text" id="titre" name="titre"><br>
        Description : <input type="text" id="descr" name="descr"><br>
        Age Minimum : <input type="number" step=1 id="age" name="age"><br>
        Niveau Requis : <input type="text" id="niveau" name="niveau"><br>
        Image : <input type="file" id="image" name="image"><br>
        <input type="hidden" name="createur" value="<?php echo $createur ?>">
    <input type="submit" value="ajouter" name="form_ajouter"/>
</form>
<?php
    $content=ob_get_clean();
    $titre = "Creer Nouvelle Formation";
    require "template.php";
?>
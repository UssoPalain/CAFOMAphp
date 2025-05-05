<?php ob_start()?>
    <form method="POST" action="index.php?action=valid-ajouter" enctype="multipart/form-data">
        <input type="hidden" name="idF" value="<?php echo $idFormation ?>"> 
        Type : <select id="type" name="type"><br>
            <option value="png">png</option>
            <option value="jpg">jpg</option>
            <option value="pdf">pdf</option>
            <option value="mp3">mp3</option>
            <option value="mp4">mp4</option>
        </select><br>
        Document : <input type="file" id="titre" name="titre"><br>
    <input type="submit" value="ajouter" name="form_ajouter"/>
</form>
<?php
    $content=ob_get_clean();
    $titre = "Ajouter Documentation";
    require "template.php";
?>
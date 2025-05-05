<?php ob_start()?>
<td><a href="index.php?action=#">Télécharger L'Application</a></td>

<?php
$content = ob_get_clean();
$titre = "Application Android";
require "Template.php";
?>
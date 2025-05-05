<?php ob_start()?>
<br>
<div class="row">
    <div class="col-8">
        <h3>Login : <?= $user->getLogin(); ?></h3> 
        <br>
        <h3>MDP : <?= $user->getMdp(); ?></h3>
        <br>
        <h3>Role : <?= $user->getRole(); ?></h3>
        <br>
        <h3>Valide : <?= $user->getValide(); ?></h3>
        <br>
    </div>
</div>
<?php
$content = ob_get_clean();
$titre = $user->getLogin();
require "Template.php";
?>
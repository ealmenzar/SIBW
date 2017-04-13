<?php if($tpl == 'New'):
    include("inc/class/Comentario.php");
    $com = new Comentario($link);
    $com->setByIdNoticia($_GET["idNew"]);
    echo $com->showAllComments(); ?>
<?php endif; ?>
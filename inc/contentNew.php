<?php
$not = new Noticia($link);
$not->setById($_GET["idNew"]);
$not->getComments(4);
echo $not->showFullNew(isset($_SESSION["user"]));
?>


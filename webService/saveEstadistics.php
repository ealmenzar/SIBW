<?php
include("../inc/library.php");
$link=conectar();
saveClick($link,$_POST["anuncio"]);
desconectar($link);
?>
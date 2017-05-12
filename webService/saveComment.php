<?php
session_start();
if(isset($_SESSION["user"])){
include("../inc/library.php");
$link=conectar();
$com=new Comentario($link);
$com->set($_POST["author"],$_POST["email"],$_POST["comment"],$_POST["idNot"]);
$com->save();
desconectar($link);
}
?>
<!doctype html>
<?php 
session_start();
include("inc/library.php");
$link=conectar();
$tpl=isset($_GET["tpl"])? $_GET["tpl"] :"Home";

if($tpl=="LogIn" and isset($_SESSION["user"])){
    if(isset($_GET["logout"])){
        unset($_SESSION["user"]);
        session_destroy();
    }else{
        $tpl="Home";
    }
}

if($tpl=="Sections" and !isset($_GET["section"])){
    $_GET["section"]="Todas";
}

if($tpl=="New" and !isset($_GET["idNew"])){
    $tpl="Home";
}
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Iván Calle Gil, Marina Estévez Almenzar">
        <meta name="description" content="Página web sobre música: noticias, discos, conciertos y festivales">
        <meta name="keywords" content="música noticias discos conciertos festivales">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script type="text/javascript" src="js/comment.js"></script>
        <script type="text/javascript" src="js/md5.js"></script>
        <script type="text/javascript" src="js/utils.js"></script>
        <link rel="stylesheet" href="css/main.css">

        <title>SIBW</title>
    </head>
    <body>
    <?php 
    include("inc/header.php");
    ?>
    <div class="two-columns">
        <div class="row">
            <div class="c-1">
                <?php 
                    if(file_exists ("inc/content$tpl.php")){
                        require("inc/content$tpl.php");
                    }else{
                        require("inc/contentHome.php");
                    }
                ?>
            </div>
            <div class="c-2">
                <?php require("inc/sidebar.php");?>
            </div>
        </div>
    </div>
    <?php include("inc/footer.php");?>
    </body>
</html>
<?php
    desconectar($link);
?>

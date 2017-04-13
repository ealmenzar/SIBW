<!doctype html>
<?php
include("inc/library.php");
$link=conectar();
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

        <title>Imprimir</title>
    </head>
    <body>
    <div class="print">
        <div id="print-logo">
            Noticia extraída de <img src="img/rreflektor.png">
            <p>Visita www.reflektor.com</p>
        </div>
        <?php
        $not = new Noticia($link);
        $not->setById($_GET["idNew"]);
        echo $not->showPrintedNew();
        ?>
    </div>
    </body>
</html>
<?php
desconectar($link);
?>
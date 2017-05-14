<?php if(isset($_SESSION["user"]) && unserialize($_SESSION["user"])->permiso === "jefe"):?>
<ul class="gestor">
    <li>
        <a class="gestor-btn" href="index.php?tpl=CommentAg">Gestor de comentarios</a>
    </li>
    <li>
        <a class="gestor-btn" href="index.php?tpl=NewsAg">Gestor de noticias</a>
    </li>
    <li>
        <a class="gestor-btn" href="index.php?tpl=PubliAg">Gestor de publicidad </a>
    </li>
    <li>
        <a class="gestor-btn" href="index.php?tpl=SectionAg">Gestor de secciones</a>
    </li>
    <li>
        <a class="gestor-btn" href="index.php?tpl=UploadAg">Subir Imagen</a>
    </li>
    <li>
        <a class="gestor-btn" href="index.php?tpl=Manage">Organizador de la página de inicio</a>
    </li>
</ul>
<?php endif;?>
<?php if(isset($_SESSION["user"]) && unserialize($_SESSION["user"])->permiso === "colaborador"):?>
<ul class="gestor">
    <li>
        <a class="gestor-btn" href="index.php?tpl=NewsAg&add=1">Añadir de noticias</a>
    </li>
</ul>
<?php endif;?>
<?php if($tpl == 'New'):

    $limit=5;
    $arrayCon=getConnectedNews($link,$limit,$_GET["idNew"]);
    $arrayPubli=getPubli($link);
    if(count($arrayCon)>0){
        echo "
    <div class=\"two-columns\">
        <div class=\"row\">
            <div class=\"c-2-1\">
                <h3>Discos relacionados</h3>";
                foreach ($arrayCon as $Con) {
                    echo "<h2>".$Con->titulo."</h2>";
                    echo "<h3>".$Con->grupo."</h3>";
                    echo "<a href='index.php?tpl=New&idNew=".$Con->id."'><img src='".$Con->portada."'style='max-width: 80%'></a>";
                }
            echo "</div>";
    }
    echo "
            <div class=\"c-2-2\">
                <h3> Publicidad </h3>";
                foreach ($arrayPubli as $publicidad) {
                    echo "<h2>".$publicidad['titulo']."</h2>";
                    echo "<h3>".$publicidad['anuncio']."</h3>";
                    echo "<a href='#' onclick='ClickCommercial(".$publicidad['id'].")'> <img src='".$publicidad['img']."'style='max-width: 80%'></a>";
                }
            echo "</div>";
        echo "</div>";
    echo "</div>";
?>

<?php else:
    $limit=5;
    $arrayCon=getConnectedNews($link,$limit,9);
    $arrayPubli=getPubli($link);
    if(count($arrayCon)>0){
    echo "
    <div class=\"two-columns\">
        <div class=\"row\">
            <div class=\"c-2-1\">
                <h3>Recomendaciones</h3>";
                foreach ($arrayCon as $Con) {
                echo "<h2>".$Con->titulo."</h2>";
                echo "<h3>".$Con->grupo."</h3>";
                echo "<a href='index.php?tpl=New&idNew=".$Con->id."'><img src='".$Con->portada."'style='max-width: 80%'></a>";
                }
                echo "</div>";
            }
    echo "
            <div class=\"c-2-2\">
                <h3> Publicidad </h3>";
    foreach ($arrayPubli as $publicidad) {
        echo "<h2>".$publicidad['titulo']."</h2>";
        echo "<h3>".$publicidad['anuncio']."</h3>";
        echo "<a href='#' onclick='ClickCommercial(".$publicidad['id'].")'> <img src='".$publicidad['img']."'style='max-width: 80%'></a>";
    }
    echo "</div>";
    echo "</div>";
    echo "</div>"; ?>

<?php endif; ?>

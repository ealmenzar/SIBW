<?php
if(!isset($_SESSION["user"]) || unserialize($_SESSION["user"])->permiso !== "jefe"){
    header("location:index.php");
}
if(isset($_POST["visible"],$_POST["orden"])){
    foreach ($_POST["visible"] as $id => $visible) {
        updatePubli($visible,$_POST["orden"][$id],$id,$link);
    }
}
if(isset($_POST["ordenNot"])){
    foreach ($_POST["ordenNot"] as $id => $orden) {
        $not = new Noticia($link);
        $not->setId($id)->load();
        $not->orden=$orden;
        $not->save();
    }
}
$arrayPubli = getAllPubli($link);
?>
<h1>Publicidad</h1>
<form method="post" action="">
<table class="white-table">
    <thead>
    <tr>
        <th>
            ID
        </th>
        <th>
            Título
        </th>
        <th>
            Anuncio
        </th>
        <th>
            Imagen
        </th>
        <th style="width:70px;">
            Estado
        </th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($arrayPubli as $publicidad) {
        echo "<tr>
            <td>" . $publicidad['id'] . "</td>
            <td>" . $publicidad['titulo'] . "</td>
            <td>" . $publicidad['anuncio'] . "</td>
            <td><img src='" . $publicidad['img'] . "'style='max-width: 20%'></td>
            <td><input type'text' name='orden[".$publicidad['id']."]' value='".$publicidad['orden']."'>
                <select name='visible[".$publicidad['id']."]'>
                <option value='1'".(($publicidad['visible']==1)?" selected":"").">Visible</option>
                <option value='0'".(($publicidad['visible']==0)?" selected":"").">No visible</option>
                </select>
            </td>
            
        </tr>";
    }
    ?>
    </tbody>
</table>
<p style="text-align: right; margin: 1em auto;min-width: 700px"><input class="edit-new" type="submit" value="Guardar"></p>
</form>
<form method="post" action="">
<?php
if(isset($_GET["pag"]) && $_GET["pag"]>0){
        $pag=$_GET["pag"];
    }else{
        $pag=1;
    }
    $numPorPag=30;
    $news=getAllNews($link,($pag-1)*$numPorPag,$numPorPag,"all",$sig);
    ?>
    <h1>Noticias</h1>
    <table class="white-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Grupo</th>
                <th>Autor</th>
                <th>Publicación</th>
                <th>Modificación</th>
                <th>Estado</th>
                <th>Orden</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($news as $new) {
                    echo $new->showNewLine2();
                }
            ?>
        </tbody>
    </table>
    <p style="text-align: right; margin: 1em auto;min-width: 700px"><input class="edit-new" type="submit" value="Guardar">
</form>

<?php 
    if($pag>1)
        echo '<a href="index.php?tpl=CommentAg&pag='.($pag-1).'">Anterior</a>';
    if($sig)
        echo '<a href="index.php?tpl=CommentAg&pag='.($pag+1).'">Siguiente</a>';
?>

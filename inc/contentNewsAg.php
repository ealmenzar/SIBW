<?php
if(!isset($_SESSION["user"]) || (((($per=(unserialize($_SESSION["user"])->permiso)) !== "jefe")) && $per!=="colaborador")){
    header("location:index.php");
}

if(isset($_GET["remove"])){
    $not=new Noticia($link);
    $not->setId($_GET["remove"])->remove();
}
if (isset($_GET["edit"]) || isset($_GET["add"])) {
    if(isset($_POST["titulo"],$_POST["grupo"],$_POST["frase"],$_POST["autor"],$_POST["pie"],$_POST["contenido"],$_POST["spotify"],$_POST["parrafo"])){
        $not=new Noticia($link);
        isset($_GET["edit"]) ? $not->setId($_GET["edit"])->load() : "";
        $not->isSet=true;
        if (isset($_FILES['portada'])) {
            /*if(isset($_GET["edit"])){
                unlink($not->portada);
            }*/
            $url="img/portadas/".basename($_FILES['portada']['name']);
            move_uploaded_file($_FILES['portada']['tmp_name'], $url);
            $not->portada=$url;
        }
        $not->titulo=$_POST["titulo"];
        $not->grupo=$_POST["grupo"];
        $not->frase=$_POST["frase"];
        $not->autor=$_POST["autor"];
        $not->pie=$_POST["pie"];
        $not->contenido=$_POST["contenido"];
        $not->spotify=$_POST["spotify"];
        $not->parrafo=$_POST["parrafo"];
        $not->estado=isset($_POST["estado"])?$_POST["estado"]:(($per=="jefe")?"publicado":"pendiente");
        $not->save();
        if(isset($_GET["edit"])){
            echo "<h2><p class='check-modify'></p></h2>";
            echo $not->showEditForm();
        }else{
            $not->associate(explode("-",$_POST["subseccion"]));
            header("location:index.php?tpl=NewsAg");
        }
        
    }else{
        $not=new Noticia($link);
        echo isset($_GET["edit"]) ? $not->setId($_GET["edit"])->load()->showEditForm(): $not->showAddForm();
    }
    
} else {
    if(isset($_GET["pag"]) && $_GET["pag"]>0){
        $pag=$_GET["pag"];
    }else{
        $pag=1;
    }
    if(isset($_GET["section"])){
        $sect=$_GET["section"];
    }else{
        $sect=0;
    }
    $numPorPag=30;
    $news=getAllNews($link,($pag-1)*$numPorPag,$numPorPag,$sect,$sig);
    $isJefe=$per=="jefe";
    $tags=getAllTags($link);
    ?>
    <a class="add-btn" href="index.php?tpl=NewsAg&add=1">Añadir Noticia</a>
    <select onchange="document.getElementById('link-seccion').href=this.value">
    <?php
        foreach ($tags as $id => $tag) {
            echo '<option value="index.php?tpl=NewsAg&section='.$id.'">'.$tag->nombre.(($tag->relacion==0)?"(Sección)":"(Subsección de ".$tags[$tag->relacion]->nombre.")").'</option>';
        }
        echo '<option value="index.php?tpl=NewsAg" selected>Todas</option>';
    ?>
    </select>
    <a class="edit-new" style="display: inline-block;width: 65px;" id="link-seccion" href="index.php?tpl=NewsAg">filtrar</a>
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
                <?php echo ($isJefe?"<th>Acciones</th>":"");?>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($news as $new) {
                    echo $new->showNewLine($isJefe);
                }
            ?>
        </tbody>
    </table>

<?php 
    if($pag>1)
        echo '<a href="index.php?tpl=CommentAg&pag='.($pag-1).'">Anterior</a>';
    if($sig)
        echo '<a href="index.php?tpl=CommentAg&pag='.($pag+1).'">Siguiente</a>';

} 
?>
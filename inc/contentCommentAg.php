<?php
if(!isset($_SESSION["user"]) || unserialize($_SESSION["user"])->permiso !== "jefe"){
    header("location:index.php");
}

if(isset($_GET["remove"])){
    $cmt=new Comentario($link);
    $cmt->setId($_GET["remove"]);
    $cmt->remove();
    echo "<h2><p class='check-modify'>Borrado correctamente &#10004;</p></h2>";
}
if (isset($_GET["edit"])) {
    if(isset($_POST["autor"],$_POST["email"],$_POST["contenido"])){
        $cmt=new Comentario($link);
        $cmt->setId($_GET["edit"])->load();
        $cmt->autor=$_POST["autor"];
        $cmt->email=$_POST["email"];
        $cmt->contenido=$_POST["contenido"];
        $cmt->save();
        echo "<h2><p class='check-modify'>Modificado correctamente &#10004;</p></h2>";
        echo $cmt->showEditForm();
    }else{
        $cmt=new Comentario($link);
        echo $cmt->setId($_GET["edit"])->load()->showEditForm();
    }
    
} else {
    if(isset($_GET["pag"]) && $_GET["pag"]>0){
        $pag=$_GET["pag"];
    }else{
        $pag=1;
    }
    $numPorPag=30;
    $comments=getComments($link,($pag-1)*$numPorPag,$numPorPag,$sig);
    ?>
    <select style="display: inline-block;" onchange="document.getElementById('link-add').href=this.value">
        <?php 
        $nots=getAllNews2($link);
        foreach ($nots as $not) {
            echo "<option value='index.php?tpl=New&opencomment=1&idNew=".$not->id."''>".$not->titulo."</option>";
        }
        ?>
    </select><a class="edit-new" style="display: inline-block;width: 170px;" id="link-add" href="index.php?tpl=New&opencomment=1&idNew=<?php echo $nots[0]->id;?>">Añadir comentario</a>
    <table class="white-table">
        <thead>
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Autor
                </th>
                <th>
                    Email
                </th>
                <th>
                    Fecha
                </th>
                <th>
                    Hora
                </th>
                <th>
                    IP
                </th>
                <th>
                    Contenido
                </th>
                <th style="width:70px;">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($comments as $comment) {
                    echo $comment->showCommentLine();
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
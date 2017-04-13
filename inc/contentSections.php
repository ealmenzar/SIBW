    <?php 
        echo "<h1>Secciones</h1>";
        $dict=getAllSections($link);
        if(!isset($dict[$_GET["section"]])){
            echo "La sección indicada no existe, las siguientes son existentes: ";
            $str="";
            foreach ($dict as $name => $id) {
                $str.="<a href=\"index.php?tpl=Sections&section=$name\">$name</a>,";
            };
            echo trim($str,",");
        }else{
            echo "<h2>".$_GET["section"]."</h2>";
            $pag=(isset($_GET["pagina"]) && ((int) $_GET["pagina"])>0)?(int) $_GET["pagina"]:1;
            $numPag=3;
            $offset=($pag-1)*$numPag;
            
            $arrayNews=getNews($link,$offset,$numPag,$dict[$_GET["section"]],$next);
            if(count($arrayNews)==0){
                $pag=1;
                $offset=($pag-1)*$numPag;
                $arrayNews=getNews($link,$offset,$numPag,$dict[$_GET["section"]],$next);
            }
            if(count($arrayNews)>0){
                echo "<ul class='news-list'>";
                foreach ($arrayNews as $New) {
                    echo "<li>".$New->showShortNew()."</li>";
                }
                echo "</ul>";
            }
            if($pag>1){
                echo "<a href='index.php?tpl=Sections&section=".$_GET["section"]."&pagina=".($pag-1)."'>Anterior</a>";
            }
            if($next){
                echo "<a href='index.php?tpl=Sections&section=".$_GET["section"]."&pagina=".($pag+1)."'>Siguiente</a>";
            }
        }
    ?>
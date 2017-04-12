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
            $offset=0;
            $limit=9;
            $arrayNews=getNews($link,$offset,$limit,$dict[$_GET["section"]]);
            if(count($arrayNews)>0){
                echo "<ul class='news-list'>";
                foreach ($arrayNews as $New) {
                    echo "<li>".$New->showShortNew()."</li>";
                }
                echo "</ul>";
            }
        }
    ?>
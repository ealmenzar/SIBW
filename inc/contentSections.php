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

            echo "<p>
            <div class='gallery'>
                  <a href='img/angel-olsen-mywoman.jpg'>
                    <img src='img/angel-olsen-mywoman.jpg'>
                  </a>
                  <div class='desc'>Angel Olsen</div>
            </div>
        
            <div class='gallery'>
                  <a href='img/james-blake-colourinanything.png'>
                    <img src='img/james-blake-colourinanything.png'>
                  </a>
                  <div class='desc'>James Blake</div>
            </div>
            
            <div class='gallery'>
                  <a href='img/king-wizard-and-nonagoninfinity.jpg'>
                    <img src='img/king-wizard-and-nonagoninfinity.jpg'>
                  </a>
                  <div class='desc'>King Wizard</div>
            </div>
            
            <div class='gallery'>
                  <a href='img/radiohead-amoonshapedpool.jpg'>
                    <img src='img/radiohead-amoonshapedpool.jpg'>
                  </a>
                  <div class='desc'>Radiohead</div>
            </div>
            
            <div class='gallery'>
                  <a href='img/kinggizzard.jpg'>
                    <img src='img/kinggizzard.jpg'>
                  </a>
                  <div class='desc'>Radiohead</div>
            </div>
            
            <div class='gallery'>
                  <a href='img/teenagefanclub-photo.jpg'>
                    <img src='img/teenagefanclub-photo.jpg'>
                  </a>
                  <div class='desc'>Teenage Fanclub</div>
            </div>
            
            <div class='gallery'>
                  <a href='img/belle-and-sebastian.jpg'>
                    <img src='img/belle-and-sebastian.jpg'>
                  </a>
                  <div class='desc'>Teenage Fanclub</div>
            </div>
            
            <div class='gallery'>
                  <a href='img/car-seat.jpg'>
                    <img src='img/car-seat.jpg'>
                  </a>
                  <div class='desc'>Teenage Fanclub</div>
            </div>
            
            <div class='gallery'>
                  <a href='img/father.jpg'>
                    <img src='img/father.jpg'>
                  </a>
                  <div class='desc'>Teenage Fanclub</div>
            </div>
            
            <div class='gallery'>
                  <a href='img/angel-olsen.jpg'>
                    <img src='img/angel-olsen.jpg'>
                  </a>
                  <div class='desc'>Angel Olsen</div>
            </div>
            
            </p>";
        }
    ?>
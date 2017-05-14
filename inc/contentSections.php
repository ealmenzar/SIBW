    <?php 
        echo "<h1>Destacados</h1>";
        $dict=getAllTags2($link);
        if(!isset($dict[$_GET["section"]])){
            echo "La sección indicada no existe, las siguientes son existentes:<br> ";
            $str="";
            foreach ($dict as $name => $value) {
                if($value["relacion"]==0){
                  $str.=" <a class='subsection-btn' href=\"index.php?tpl=Sections&section=$name\">$name</a> ";
                }
                
            };
            echo $str;
        }else{
            $idSection=($dict[$_GET["section"]]["relacion"]==0)?$dict[$_GET["section"]]["id"]:$dict[$_GET["section"]]["relacion"];

            echo "<h2>".$_GET["section"]."</h2>";
            $str="";
            foreach ($dict as $name => $value) {
                if($value["id"]==$idSection){
                  $nameSection=$name;
                }
                if ($value["relacion"]==$idSection) {
                  $str.=" <a class='subsection-btn' href=\"index.php?tpl=Sections&section=$name\">$name</a> ";
                }
            };
            $str.=" <a class='subsection-btn' href=\"index.php?tpl=Sections&section=$nameSection\">Todas</a> ";
            echo $str;
            $pag=(isset($_GET["pagina"]) && ((int) $_GET["pagina"])>0)?(int) $_GET["pagina"]:1;
            $numPag=6;
            $offset=($pag-1)*$numPag;

            $arrayNews=getNews($link,$offset,$numPag,$dict[$_GET["section"]]["id"],$next);
            if(count($arrayNews)==0){
                $pag=1;
                $offset=($pag-1)*$numPag;
                $arrayNews=getNews($link,$offset,$numPag,$dict[$_GET["section"]]["id"],$next);
            }
            if(count($arrayNews)>0){
                echo "<ul class='news-list'>";
                foreach ($arrayNews as $New) {
                    echo "<li>".$New->showShortNew()."</li>";
                }
                echo "</ul>";
            }
            if($pag>1){
                echo "<a class='arrow' href='index.php?tpl=Sections&section=".$_GET["section"]."&pagina=".($pag-1)."'><svg width='40' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 164 120.75' version='1.1' x='0px' y='0px'><title>Fill 79</title><desc>Created with Sketch.</desc><g stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'><g transform='translate(-5634.000000, -1759.000000)' fill='#454472'><path d='M5724.8553,1764.5493 C5724.8553,1760.1493 5721.7773,1758.5093 5718.0143,1760.9053 L5637.6303,1812.0883 C5633.8683,1814.4843 5633.8683,1818.4043 5637.6303,1820.8003 L5718.0143,1871.9833 C5721.7773,1874.3793 5724.8553,1872.7393 5724.8553,1868.3393 L5724.8553,1844.2743 C5724.8553,1839.8743 5728.5253,1836.2743 5733.0113,1836.2743 L5789.7243,1836.2743 C5794.2103,1836.2743 5797.8803,1832.6743 5797.8803,1828.2743 L5797.8803,1804.6143 C5797.8803,1800.2143 5794.2103,1796.6143 5789.7243,1796.6143 L5733.0113,1796.6143 C5728.5253,1796.6143 5724.8553,1793.0143 5724.8553,1788.6143 L5724.8553,1764.5493 Z'/></g></g><text x='0' y='130' fill='#000000' font-size='5px' font-weight='bold' font-family=''Helvetica Neue', Helvetica, Arial-Unicode, Arial, Sans-serif'>Created by Thomas Miller</text><text x='0' y='135' fill='#000000' font-size='5px' font-weight='bold' font-family='Helvetica Neue', Helvetica, Arial-Unicode, Arial, Sans-serif'>from the Noun Project</text></svg></a>";
            }
            if($next){
                echo "<a class='arrow' href='index.php?tpl=Sections&section=".$_GET["section"]."&pagina=".($pag+1)."'><svg width='40' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 165 120.75' version='1.1' x='0px' y='0px'><title>Fill 77</title><desc>Created with Sketch.</desc><g stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'><g transform='translate(-5443.000000, -1756.000000)' fill='#454472'><path d='M5517.2967,1865.4414 C5517.2967,1869.8414 5520.3937,1871.4814 5524.1797,1869.0854 L5605.0567,1817.9024 C5608.8417,1815.5064 5608.8417,1811.5864 5605.0567,1809.1914 L5524.1797,1758.0074 C5520.3937,1755.6114 5517.2967,1757.2524 5517.2967,1761.6514 L5517.2967,1785.7164 C5517.2967,1790.1164 5513.6037,1793.7164 5509.0907,1793.7164 L5452.0297,1793.7164 C5447.5167,1793.7164 5443.8237,1797.3164 5443.8237,1801.7164 L5443.8237,1825.3764 C5443.8237,1829.7764 5447.5167,1833.3764 5452.0297,1833.3764 L5509.0907,1833.3764 C5513.6037,1833.3764 5517.2967,1836.9764 5517.2967,1841.3764 L5517.2967,1865.4414 Z'/></g></g><text x='0' y='130' fill='#000000' font-size='5px' font-weight='bold' font-family=''Helvetica Neue', Helvetica, Arial-Unicode, Arial, Sans-serif'>Created by Thomas Miller</text><text x='0' y='135' fill='#000000' font-size='5px' font-weight='bold' font-family='Helvetica Neue', Helvetica, Arial-Unicode, Arial, Sans-serif'>from the Noun Project</text></svg></a>";
            }
            echo "<h2>Galería</h2>";
            echo "<p>
            <div class='grill'>
              <div class='gallery'>
                    <a href='img/angel-olsen-mywoman.jpg'>
                      <img src='img/angel-olsen-mywoman.jpg'>
                    </a>
                    <div class='desc'>Angel Olsen</div>
              </div>
            </div>
            <div class='grill'>
              <div class='gallery'>
                    <a href='img/james-blake-colourinanything.png'>
                      <img src='img/james-blake-colourinanything.png'>
                    </a>
                    <div class='desc'>James Blake</div>
              </div>
                </div>
            <div class='grill'>
              <div class='gallery'>
                    <a href='img/king-wizard-and-nonagoninfinity.jpg'>
                      <img src='img/king-wizard-and-nonagoninfinity.jpg'>
                    </a>
                    <div class='desc'>King Wizard</div>
              </div>
                </div>
            <div class='grill'>
              <div class='gallery'>
                    <a href='img/radiohead-amoonshapedpool.jpg'>
                      <img src='img/radiohead-amoonshapedpool.jpg'>
                    </a>
                    <div class='desc'>Radiohead</div>
              </div>
                </div>
            <div class='grill'>
              <div class='gallery'>
                    <a href='img/kinggizzard.jpg'>
                      <img src='img/kinggizzard.jpg'>
                    </a>
                    <div class='desc'>Radiohead</div>
              </div>
                </div>
            <div class='grill'>
              <div class='gallery'>
                    <a href='img/teenagefanclub-photo.jpg'>
                      <img src='img/teenagefanclub-photo.jpg'>
                    </a>
                    <div class='desc'>Teenage Fanclub</div>
              </div>
                </div>
            <div class='grill'>
              <div class='gallery'>
                    <a href='img/belle-and-sebastian.jpg'>
                      <img src='img/belle-and-sebastian.jpg'>
                    </a>
                    <div class='desc'>Teenage Fanclub</div>
              </div>
                </div>
            <div class='grill'>
              <div class='gallery'>
                    <a href='img/car-seat.jpg'>
                      <img src='img/car-seat.jpg'>
                    </a>
                    <div class='desc'>Teenage Fanclub</div>
              </div>
                </div>
            <div class='grill'>
              <div class='gallery'>
                    <a href='img/father.jpg'>
                      <img src='img/father.jpg'>
                    </a>
                    <div class='desc'>Teenage Fanclub</div>
              </div>
                </div>
            <div class='grill'>
              <div class='gallery'>
                    <a href='img/angel-olsen.jpg'>
                      <img src='img/angel-olsen.jpg'>
                    </a>
                    <div class='desc'>Angel Olsen</div>
              </div>
                </div>
            </p>";
        }
    ?>
    <?php
        $new=getLastNew($link);
        echo $new->showMainNew();
        $offset=1;
        $limit=9;
        $arrayNews=getNews($link,$offset,$limit,0);
        if(count($arrayNews)>0){
            echo "<ul class='news-list'>";
            foreach ($arrayNews as $New) {
                echo "<li>".$New->showShortNew()."</li>";
            }
            echo "</ul>";
        }
    ?>
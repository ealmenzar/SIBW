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

<?php if($tpl == 'New'):

    $limit=5;
    $arrayCon=getConnectedNews($link,$limit,$_GET["idNew"]);
    if(count($arrayCon)>0){
    echo" <h3>Discos relacionados</h3>";
        foreach ($arrayCon as $Con) {
            echo "<h2>".$Con->titulo."</h2>";
            echo "<h3>".$Con->grupo."</h3>";
            echo "<a href='index.php?tpl=New&idNew=".$Con->id."'><img src='".$Con->portada."'style='max-width: 80%'></a>";
         }
    } ?>

<?php else: ?>
    <h3> Publicidad </h3>
    <h2> Primavera Sound 2017 </h2>
    <h3> Consigue tu abono </h3>
    <a href="#~" onclick="ClickCommercial('Primavera Sound 2017-Consigue tu abono')">
        <img src="img/publi/publi1.jpeg" style="max-width: 80%">
    </a>
    <h2> Coachella 2017 </h2>
    <h3> Consigue tu abono </h3>
    <a href="#~" onclick="ClickCommercial('Coachella 2017-Consigue tu abono')">
        <img src="img/publi/publi2.jpg" style="max-width: 80%">
    </a>
    <h2> Gira Father John Misty </h2>
    <h3> Nuevas fechas </h3>
    <a href="#~" onclick="ClickCommercial('Gira Father John Misty-Nuevas fechas')">
        <img src="img/publi/publi3.png" style="max-width: 80%">
    </a>
    <h2> Subpop Records </h2>
    <h3> 20% de descuento </h3>
    <a href="#~" onclick="ClickCommercial('Subpop Records-20% de descuento')">
        <img src="img/publi/publi5.jpg" style="max-width: 80%">
    </a>
    <h2> Rosalía </h2>
    <h3> Nuevo disco </h3>
    <a href="#~" onclick="ClickCommercial('Rosalía-Nuevo disco')">
        <img src="img/rosalia-los-angeles.jpg" style="max-width: 80%">
    </a>

<?php endif; ?>

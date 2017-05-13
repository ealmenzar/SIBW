<?php
if(!isset($_SESSION["user"]) || unserialize($_SESSION["user"])->permiso !== "jefe"){
header("location:index.php");
}

if(isset($_GET["remove"])){
    $id_remove=$_GET["remove"];
    $id=str_replace("'","\'",$id_remove);
    $query="DELETE FROM publicidad WHERE id='$id'";
    $link->query($query);
    echo "<h2><p class='check-modify'>Borrado correctamente &#10004;</p></h2>";
}

if (isset($_GET["edit"])) {
    $id_edit = $_GET["edit"];
    $id = str_replace("'", "\'", $id_edit);
    $arrayPubli = getPubliById($id, $link);
    if(isset($_POST["titulo"],$_POST["anuncio"],$_FILES["img"])) {
        $url="img/publi/".basename($_FILES['img']['name']);
        move_uploaded_file($_FILES['img']['tmp_name'], $url);
        $img=$url;
        $img = str_replace("'", "\'", $img);
        $titulo = str_replace("'", "\'", $_POST["titulo"]);
        $anuncio = str_replace("'", "\'", $_POST["anuncio"]);

        $query = "UPDATE publicidad SET titulo = '$titulo',anuncio = '$anuncio',imagen = '$img' WHERE id ='$id'";
        $link->query($query);
        echo "<h2><p class='check-modify'>Modificado correctamente &#10004;</p></h2>";
        echo"
            <div class='edit'>
            <form method='post' action=''>
                <input type=\"text\" name='titulo' value='".$titulo."'><br>
                <input type=\"text\" name='anuncio' value='".$anuncio."'><br>
                <input type='text' name='img' value='".$img."'><br>
                <input type=\"submit\" value='Guardar'><br>
            </form>
            </div>";

    } else {
            echo "
                <div class='edit'>
                <form method='post' action='' enctype=\"multipart/form-data\">
                    <input type=\"text\" name='titulo' value='" . $arrayPubli['titulo'] . "' required><br>
                    <input type=\"text\" name='anuncio' value='" . $arrayPubli['anuncio'] . "' required><br>
                    <h3>Imagen </h3><input type=\"file\" name='img' value='" . $arrayPubli['img'] . "' required><br>
                    <input type=\"submit\" value='Guardar'><br>
                </form>
                </div>";
        }
} else {
    if (isset($_GET["add"])) {
        if (isset($_POST["titulo"], $_POST["anuncio"], $_FILES["img"])) {
            $url="img/publi/".basename($_FILES['img']['name']);
            move_uploaded_file($_FILES['img']['tmp_name'], $url);
            $img=$url;
            $img = str_replace("'", "\'", $img);
            $titulo = str_replace("'", "\'", $_POST["titulo"]);
            $anuncio = str_replace("'", "\'", $_POST["anuncio"]);
            $query = "INSERT INTO publicidad (id, anuncio, titulo, imagen) VALUES (null, '$anuncio', '$titulo', '$img')";
            $link->query($query);
            header("location:index.php?tpl=PubliAg");
        } else {
            echo "
                <div class='edit'>
                <form method='post' action='' enctype=\"multipart/form-data\">
                    <h3>Título</h3><input type=\"text\" name='titulo' required><br>
                    <h3>Anuncio</h3><input type='text' name='anuncio' required><br>
                    <h3>Imagen </h3><input type=\"file\" name='img' required><br>
                    <input type=\"submit\" value='Guardar'><br>
                </form>
                </div>";
        }
    } else {
        $arrayPubli = getPubli($link);
        ?>
        <a class="add-btn" href="index.php?tpl=PubliAg&add=1">Añadir Publicidad</a>
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
                    Acciones
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
                    <td>" . '<a style="display:inline-block" href="index.php?tpl=PubliAg&remove=' . $publicidad['id'] . '">
                        <svg style="height:30px;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" viewBox="0 0 79 100" version="1.1" x="0px" y="0px"><title>trash</title><desc>Created with Sketch.</desc><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage"><path d="M58.6214398,90 L20.3785602,90 C17.2516658,90 14.2778841,86.49426 13.7379424,82.1673877 L6.76143193,23.4782609 L72.2385681,23.4782609 L65.2620576,82.1673877 C64.722246,86.49322 61.7484595,90 58.6214398,90 L58.6214398,90 Z M37.525,79.2391304 C37.525,80.3196876 38.4092376,81.1956522 39.5,81.1956522 C40.5907624,81.1956522 41.475,80.3196876 41.475,79.2391304 L41.475,34.2391304 C41.475,33.1585733 40.5907624,32.2826087 39.5,32.2826087 C38.4092376,32.2826087 37.525,33.1585733 37.525,34.2391304 L37.525,79.2391304 L37.525,79.2391304 Z M51.4175337,78.8329788 C51.2846032,79.9054816 52.0544884,80.8816702 53.1371204,81.013357 C54.2197524,81.1450438 55.2051605,80.3823617 55.338091,79.3098589 L60.8740059,34.645282 C61.0069364,33.5727792 60.2370512,32.5965907 59.1544192,32.4649039 C58.0717872,32.3332171 57.0863791,33.0958992 56.9534486,34.168402 L51.4175337,78.8329788 L51.4175337,78.8329788 Z M23.661909,79.3098589 C23.7948395,80.3823617 24.7802476,81.1450438 25.8628796,81.013357 C26.9455116,80.8816702 27.7153968,79.9054816 27.5824663,78.8329788 L22.0465514,34.168402 C21.9136209,33.0958992 20.9282128,32.3332171 19.8455808,32.4649039 C18.7629488,32.5965907 17.9930636,33.5727792 18.1259941,34.645282 L23.661909,79.3098589 L23.661909,79.3098589 Z M19.996875,11.7391304 L3.94465095,11.7391304 C1.76079116,11.7391304 0,13.4910597 0,15.6521739 C0,17.8088907 1.76608039,19.5652174 3.94465095,19.5652174 L75.055349,19.5652174 C77.2392088,19.5652174 79,17.8132882 79,15.6521739 C79,13.4954571 77.2339196,11.7391304 75.055349,11.7391304 L59.003125,11.7391304 L59.003125,7.81719411 C59.003125,3.49505008 55.4609247,0 51.0977115,0 L27.9022885,0 C23.5318911,0 19.996875,3.49491816 19.996875,7.81719411 L19.996875,11.7391304 L19.996875,11.7391304 Z M27.896875,11.7391304 L51.1033048,11.7391304 C51.1034486,10.3810594 51.1030144,7.82608696 51.0977115,7.82608696 C51.0977115,7.82608696 27.896875,7.82066799 27.896875,7.81719411 L27.896875,11.7391304 L27.896875,11.7391304 Z" fill="#000000" sketch:type="MSShapeGroup"/></g><text x="0" y="105" fill="#000000" font-size="5px" font-weight="bold" font-family="\'Helvetica Neue\', Helvetica, Arial-Unicode, Arial, Sans-serif">Created by Julynn B.</text><text x="0" y="110" fill="#000000" font-size="5px" font-weight="bold" font-family="\'Helvetica Neue\', Helvetica, Arial-Unicode, Arial, Sans-serif">from the Noun Project</text></svg>
                        </a>

                        <a style="display:inline-block" href="index.php?tpl=PubliAg&edit=' . $publicidad['id'] . '">
                            <svg style="height:30px; xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 100 100" x="0px" y="0px"><title>2Artboard 56</title><path d="M2,86V32A12,12,0,0,1,14,20H50.68L38.88,32H14V86H68V61.12L80,49.32V86A12,12,0,0,1,68,98H14A12,12,0,0,1,2,86ZM89,2a9,9,0,0,0-6.36,2.64L40,48a12.28,12.28,0,0,0-2.9,4.73l-4.32,13a1.23,1.23,0,0,0,1.55,1.55l13-4.32A12.28,12.28,0,0,0,52,60L95.36,17.36A9,9,0,0,0,89,2Z"/><text x="0" y="115" fill="#000000" font-size="5px" font-weight="bold" font-family="\'Helvetica Neue\', Helvetica, Arial-Unicode, Arial, Sans-serif">Created by Gregor Cresnar</text><text x="0" y="120" fill="#000000" font-size="5px" font-weight="bold" font-family="\'Helvetica Neue\', Helvetica, Arial-Unicode, Arial, Sans-serif">from the Noun Project</text></svg>' . "</td>
                        </a>
                    
                </tr>";
            }
            ?>
            </tbody>
        </table>
        <?php
    }
}
?>
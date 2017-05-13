<?php
if(!isset($_SESSION["user"]) || unserialize($_SESSION["user"])->permiso !== "jefe"){
    header("location:index.php");
}

?>
<table class="white-table">
    <thead>
    <tr>
        <th>
            ID
        </th>
        <th>
            Nombre
        </th>
        <th>
            Relación
        </th>
        <th style="width:70px;">
            Acciones
        </th>
    </tr>
    </thead>
    <tbody>
    <?php
    // sacar las líneas de la BD
    ?>
    </tbody>
</table>
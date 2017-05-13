<?php
if(!isset($_SESSION["user"]) || unserialize($_SESSION["user"])->permiso !== "jefe"){
    header("location:index.php");
}
if (isset($_FILES['img'])) {
    $url="img/uploads/".basename($_FILES['img']['name']);
    move_uploaded_file($_FILES['img']['tmp_name'], $url);
    $url=str_replace("'", "\'", $url);
    $link->query("INSERT INTO imagenes (id,url) VALUE (NULL,'$url')");
}
$result=$link->query("SELECT * FROM imagenes ORDER BY id DESC");
?>
<div class="login">
    <form method='post' action='' enctype="multipart/form-data">
        <input type="file" name="img"><br>
        <input type="submit" value="Subir">
    </form>
</div>
<ul>
    <?php
    while ($obj=$result->fetch_object()) {
        echo "<li class='img-uploaded'>
            <img src='$obj->url'>
            <p>$obj->url</p>
        </li>";
    }
        
    ?>
</ul>
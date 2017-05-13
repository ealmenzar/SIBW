<?php
include($_SERVER["DOCUMENT_ROOT"]."/SIBW/inc/class/Noticia.php");
include($_SERVER["DOCUMENT_ROOT"]."/SIBW/inc/class/User.php");
include($_SERVER["DOCUMENT_ROOT"]."/SIBW/inc/class/Comentario.php");
function conectar(){
	$db = new mysqli('127.0.0.1', 'reflektor', '8pHqgP3PbUVzM7eh', 'reflektor_sibw');
	if ($db->connect_errno) {
	    echo "Lo sentimos, este sitio web está experimentando problemas.";

	    //cambiar a un archivo la salida

	    echo "Error: Fallo al conectarse a MySQL debido a: \n";
	    echo "Errno: " . $db->connect_errno . "\n";
	    echo "Error: " . $db->connect_error . "\n";

	    exit;
	}
	mysqli_set_charset($db, "utf8");
	return $db;
}
function desconectar($db){
	return $db->close();
}
function convertDateSystemToHuman($date){
	$dateObj=new DateTime($date);
	return $dateObj->format("d/m/Y");
}
function convertDateHumanToSystem($date){
	$dateArray=explode("/",$date);
	return $dateArray[2]."-".$dateArray[1]."-".$dateArray[0];
}

function getLastNew($link){
	$query="SELECT * FROM noticias WHERE estado='publicado' ORDER BY orden ASC";
	$result=$link->query($query);
	if($obj=$result->fetch_object()){
		$Not=new Noticia($link);
		$Not->setByMySQLObject($obj);
	}
	if(isset($Not)){
		return $Not;
	}
}

function getNews($link,$offset,$limit,$section,&$existNext=null){
	$section=str_replace("'", "\'", $section);
	$limit2=$limit+1;
	if($section==0){
		$query="SELECT * FROM noticias WHERE estado='publicado' ORDER BY orden ASC LIMIT $limit2 OFFSET $offset ";
	}else{
		$query="SELECT * FROM noticias WHERE estado='publicado' ORDER BY orden ASC INNER JOIN noticia_etiqueta ON noticia_etiqueta.id_noticia=noticias.id 
		WHERE noticia_etiqueta.id_etiqueta='$section' ORDER BY noticias.id DESC LIMIT $limit2 OFFSET $offset";
	}
	$result=$link->query($query);
	$arrayNot=array();
	$i=0;
	while($i<$limit && $obj=$result->fetch_object()){
		$Not=new Noticia($link);
		$Not->setByMySQLObject($obj);
		$arrayNot[$i]=$Not;
		$i++;
	}
	$existNext=$result->fetch_object();
	return $arrayNot;
}
function getAllNews($link,$offset,$limit,$section,&$existNext=null){
	$section=str_replace("'", "\'", $section);
	$limit2=$limit+1;
	if($section==0){
		$query="SELECT * FROM noticias ORDER BY id DESC LIMIT $limit2 OFFSET $offset ";
	}else{
		$query="SELECT * FROM noticias INNER JOIN noticia_etiqueta ON noticia_etiqueta.id_noticia=noticias.id 
		WHERE noticia_etiqueta.id_etiqueta='$section' ORDER BY noticias.id DESC LIMIT $limit2 OFFSET $offset";
	}
	$result=$link->query($query);
	$arrayNot=array();
	$i=0;
	while($i<$limit && $obj=$result->fetch_object()){
		$Not=new Noticia($link);
		$Not->setByMySQLObject($obj);
		$arrayNot[$i]=$Not;
		$i++;
	}
	$existNext=$result->fetch_object();
	return $arrayNot;
}

function getComments($link,$offset,$limit,&$existNext=null){
	$limit2=$limit+1;
	$query="SELECT * FROM comentarios ORDER BY fecha DESC LIMIT $limit2 OFFSET $offset ";
	$result=$link->query($query);
	$arrayCom=array();
	$i=0;
	while($i<$limit && $obj=$result->fetch_object()){
		$Com=new Comentario($link);
		$Com->setByMySQLObject($obj);
		$arrayCom[]=$Com;
		$i++;
	}
	$existNext=$result->fetch_object();
	return $arrayCom;
}

function getAllSubSections($link){
	$query="SELECT * FROM etiquetas WHERE relacion <> 0 ORDER BY id DESC";
	$result=$link->query($query);
	$arrayTag=array();
	$i=0;
	while($obj=$result->fetch_object()){
		$arrayTag[$obj->nombre]=$obj->id;
		$i++;
	}
	$arrayTag["Todas"]=0;
	return $arrayTag;
}
function getAllTags($link){
	$query="SELECT * FROM etiquetas";
	$result=$link->query($query);
	$arrayTag=array();
	while($obj=$result->fetch_object()){
		$arrayTag[$obj->id]=$obj;
	}
	return $arrayTag;
}

function getSectionsToAg($link){
    $query="SELECT * FROM etiquetas ORDER BY id DESC";
    $result=$link->query($query);
    $arraySection=array();
    $i=0;
    while($obj=$result->fetch_object()){
        $arraySection[$i]["id"]=$obj->id;
        $arraySection[$i]["nombre"]=$obj->nombre;
        $arraySection[$i]["relacion"]=$obj->relacion;
        $i++;
    }
    return $arraySection;
}

function getSectionById($id, $link){
    $query = "SELECT * FROM etiquetas WHERE id='$id'";
    $result=$link->query($query);
    $arraySection=array();
    while($obj=$result->fetch_object()){
        $arraySection["id"]=$obj->id;
        $arraySection["nombre"]=$obj->nombre;
        $arraySection["relacion"]=$obj->relacion;
    }
    return $arraySection;
}

function getPubli($link){
    $query = "SELECT * FROM publicidad ORDER BY id DESC";
    $result=$link->query($query);
    $arrayPubli=array();
    $i=0;
    while($obj=$result->fetch_object()){
        $arrayPubli[$i]["id"]=$obj->id;
        $arrayPubli[$i]["anuncio"]=$obj->anuncio;
        $arrayPubli[$i]["titulo"]=$obj->titulo;
        $arrayPubli[$i]["img"]=$obj->imagen;
        $i++;
    }
    return $arrayPubli;
}

function getPubliById($id, $link){
    $query = "SELECT * FROM publicidad WHERE id='$id'";
    $result=$link->query($query);
    $arrayPubli=array();
    while($obj=$result->fetch_object()){
        $arrayPubli["id"]=$obj->id;
        $arrayPubli["anuncio"]=$obj->anuncio;
        $arrayPubli["titulo"]=$obj->titulo;
        $arrayPubli["img"]=$obj->imagen;
    }
    return $arrayPubli;
}

function getConnectedNews($link, $limit, $id){
	$id=str_replace("'", "\'", $id);
    $query="SELECT * FROM noticias WHERE estado='publicado' INNER JOIN noticia_etiqueta ON noticia_etiqueta.id_noticia=noticias.id 
WHERE noticia_etiqueta.id_etiqueta in (SELECT id_etiqueta from noticia_etiqueta WHERE id_noticia='$id') 
AND noticias.id<>'$id' GROUP BY noticias.id ORDER BY RAND() LIMIT $limit";
    $result=$link->query($query);
    $arrayCon=array();
    $i=0;
    while($obj=$result->fetch_object()){
        $Con=new Noticia($link);
        $Con->setByMySQLObject($obj);
        $arrayCon[$i]=$Con;
        $i++;
    }
    return $arrayCon;
}
function getBanWord($link){
	$query="SELECT * FROM palabras";
	$result=$link->query($query);
	$words=array();
	$i=0;
	while($obj=$result->fetch_object()){
		$words[$i]=$obj->palabra;
		$i++;
	}
	return $words;
}
function saveClick($link,$anuncio){
	$anuncio=str_replace("'", "\'", $anuncio);
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    $query="INSERT INTO clicks (click, ip, id_publi, fecha) VALUES (NULL, '$ip', '$anuncio', NOW())";
    $link->query($query);
}
?>
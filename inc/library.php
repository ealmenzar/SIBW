<?php
include("inc/class/Noticia.php");
include("inc/class/User.php");
function conectar(){
	$db = new mysqli('127.0.0.1', 'reflektor', '8pHqgP3PbUVzM7eh', 'reflektor_sibw');
	if ($db->connect_errno) {
	    echo "Lo sentimos, este sitio web está experimentando problemas.";

	    //cambiar a un archivo la salida

	    echo "Error: Fallo al conectarse a MySQL debido a: \n";
	    echo "Errno: " . $bd->connect_errno . "\n";
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

function getLastNew($link){
	$query="SELECT * FROM noticias ORDER BY id DESC";
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
	//$sqlinjection section
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
function getAllSections($link){
	$query="SELECT * FROM etiquetas ORDER BY id DESC";
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

function getConnectedNews($link, $limit, $id){
    $query="SELECT * FROM noticias INNER JOIN noticia_etiqueta ON noticia_etiqueta.id_noticia=noticias.id 
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
?>
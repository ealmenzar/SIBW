<?php
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
?>
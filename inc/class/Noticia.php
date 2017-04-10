<?php
class Noticia { 

	function __construct($link) {
        $this->link=$link;
        $this->isSet=false;
    }
    
	function setByMySQLObject($obj) { 
        $this->id=$obj->id;
        $this->titulo=$obj->titulo;
        $this->grupo=$obj->grupo;
        $this->frase=$obj->frase;
        $this->autor=$obj->autor;
        $this->publicacion=$obj->publicacion;
        $this->portada=$obj->portada;
        $this->pie=$obj->pie;
        $this->contenido=$obj->contenido;
        $this->spotify=$obj->spotify;
        $this->isSet=true;
    }

    function setById($id) { 
    	//comprobacion id
        $query="SELECT * FROM noticias WHERE id='$id' ";
    	$result=$this->link->query($query);
    	if($obj=$result->fetch_object()){
    		$this->setByMySQLObject($obj);
    	}
    } 

    function showFullNew() { 
    	if($this->isSet){
	    	return "<h1 style='font-size: xx-large'> $this->titulo </h1>
	                <h2> $this->grupo </h2>
	                <p>
	                <h4>
	                    $this->frase
	                </h4>
	                <div id='autor'>
	                    <address>por $this->autor</address>".
	                    convertDateSystemToHuman($this->publicacion)."
	                </div>
	                </p>
	                <div class='main-img'>
	                    <img src='$this->portada' style='width: 55%'>
	                    $this->spotify
	                    <p>$this->pie</p>
	                </div>
	                $this->contenido
	                <div id='bottom-new'>
	                    <div >
	                        <a href='noticia_imprimir.html'>
	                            <img src='img/print.png'>
	                        </a>
	                        <button class='comment-btn' onclick='Toggle('show','coment-block')'>Comentar</button>
	                    </div>
	                </div>";
            }
    } 

    function showShortNew() { 
    	if($this->isSet){
	    	return "<h2> $this->titulo </h2>
	                <h3> $this->grupo </h3>
	                <a href='index.php?tpl=New&idNew=$this->id'>
	                    <img src='$this->portada' style='max-width: 70%'>
	                </a>
	                <p>
	                    $this->frase
	                </p>";
        }
    } 
}
?>
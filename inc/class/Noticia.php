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
        $this->parrafo=$obj->parrafo;
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
	                    <img src='$this->portada' style='width: 35%'>
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
    		$phraseCut=(strlen($this->parrafo)<=400)?$this->parrafo : substr ($this->parrafo, 0,400)."...";
	    	return "<h2> $this->titulo </h2>
	                <h3> $this->grupo </h3>
	                <a href='index.php?tpl=New&idNew=$this->id'>
	                    <img src='$this->portada' style='max-width: 70%'>
	                </a>
	                <p>
	                    $phraseCut
	                </p>
	                <a href='index.php?tpl=New&idNew=$this->id'>
	                    Leer más
	                </a>";
        }
    } 
    function showMainNew(){
    	if($this->isSet){
    		return "<div id='main-new'>
				    	<div class='two-columns'>
					        <div class='row'>
					            <h2> $this->titulo </h2>
					            <h3> $this->grupo </h3>
					        </div>
					        <div class='row'>
					            <div class='main-col-1'>
					                <a href='index.php?tpl=New&idNew=$this->id'>
					                    <img src='$this->portada'>
					                </a>
					            </div>
					            <div class='main-col-2'>
					                $this->parrafo
					                <p>
					                    <a href='index.php?tpl=New&idNew=$this->id' style='color: #999999; font-size: larger' >[...]</a>
					                </p>
					            </div>
					        </div>
					    </div>
					</div>";
		}

    }
}
?>
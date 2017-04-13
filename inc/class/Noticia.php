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
        $this->modificacion=$obj->modificacion;
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

    function getComments($limit){
	    if($this->isSet) {
            $query = "SELECT * FROM comentarios WHERE id_noticia='$this->id' ORDER BY fecha ASC ";
            $result = $this->link->query($query);
            $this->comments = array();
            $i = 0;
            while ($i < $limit && $obj = $result->fetch_object()) {
                $Com = new Comentario($this->link);
                $Com->setByMySQLObject($obj);
                $this->comments[$i] = $Com;
                $i++;
            }
        }
    }

    function showFullNew() { 
    	if($this->isSet){
    	    $str="";
    	    if(isset($this->comments)){
                    $str.="<aside id='coment-block'>
                            <ul id='comments'>";
                    foreach ($this->comments as $Com){
                            $str.= $Com->showComment();
                    }
                    $str.= "</ul>
                        <p id='error-1' class='error'>
                        Por favor, no se haga pasar por parte del staff de la página web
                        </p>
                            <p id='error-2' class='error'>
                        Por favor, siga las reglas de la página web y no comparta información personal, como correos, números de teléfono... Y NO INSULTE
                        </p>
                            <div>
                                <input type='text' placeholder='Nombre' id='author' onkeyup='ValidateAuthor(this,\"show\",\"error - 1\")'><br>
                                <input type='text' placeholder='Email' id='email' onkeyup='ValidateComment(this,\"show\",\"error - 2\")'><br>
                                <textarea placeholder='Escribe aquí tu comentario...' id='comment' onkeyup='ValidateComment(this,\"show\",\"error - 2\")'></textarea><br>
                                <button class='comment-btn' onclick='SubmitComment(\"author\",\"email\",\"comment\",\"comments\")'>Enviar Comentario</button>
                            </div>
                        
                            </aside>";
                    }
                    $str.="<h1 style='font-size: xx-large'> $this->titulo </h1>
	                <h2> $this->grupo </h2>
	                <p>
	                <h4>
	                    $this->frase
	                </h4>
	                <div id='autor'>
	                    <address>por $this->autor</address>
	                    Publicación: ".convertDateSystemToHuman($this->publicacion)."<br>
	                    Última modificación: ".convertDateSystemToHuman($this->modificacion)."
	                </div>
	                </p>
	                <div class='main-img'>
	                    <img src=\"$this->portada\" style=\"width: 35%\">
	                    $this->spotify
	                    <p>$this->pie</p>
	                </div>
	                $this->contenido
	                <div id='bottom-new'>
	                    <div >
	                        <a href='noticia_imprimir.php?idNew=$this->id'>
	                            <img src='img/print.png'>
	                        </a>
	                        <button class='comment-btn' onclick='Toggle(\"show\",\"coment-block\")'>Comentar</button>
	                    </div>
	                    <div class='social'>
	                    <ul>
				            <li>
		                    <a onclick='show(\"modal-new\")'>
				                    <img src='img/facebook.png'>
				                </a>
				            </li>
				            <li>
				                <a onclick=\"show('modal-new')\">
				                    <img src='img/twitter.png'>
				                </a>
				            </li>
			            </ul>
			            </div>
	                </div>
	        <section class='overlay' id='modal-new'>

	            <div>
	            <svg onclick='hide(\"modal-new\")' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' x='0px' y='0px' viewBox='0 0 100 100' enable-background='new 0 0 100 100' xml:space='preserve'><g><path d='M83.288,88.13c-2.114,2.112-5.575,2.112-7.689,0L53.659,66.188c-2.114-2.112-5.573-2.112-7.687,0L24.251,87.907   c-2.113,2.114-5.571,2.114-7.686,0l-4.693-4.691c-2.114-2.114-2.114-5.573,0-7.688l21.719-21.721c2.113-2.114,2.113-5.573,0-7.686   L11.872,24.4c-2.114-2.113-2.114-5.571,0-7.686l4.842-4.842c2.113-2.114,5.571-2.114,7.686,0L46.12,33.591   c2.114,2.114,5.572,2.114,7.688,0l21.721-21.719c2.114-2.114,5.573-2.114,7.687,0l4.695,4.695c2.111,2.113,2.111,5.571-0.003,7.686   L66.188,45.973c-2.112,2.114-2.112,5.573,0,7.686L88.13,75.602c2.112,2.111,2.112,5.572,0,7.687L83.288,88.13z'/></g><text x='0' y='115' fill='#000000' font-size='5px' font-weight='bold' font-family=''Helvetica Neue', Helvetica, Arial-Unicode, Arial, Sans-serif'>Created by Evgeniy Kozachenko</text><text x='0' y='120' fill='#000000' font-size='5px' font-weight='bold' font-family=''Helvetica Neue', Helvetica, Arial-Unicode, Arial, Sans-serif'>from the Noun Project</text></svg>
	                <h2> $this->titulo </h2>
	                <img src='$this->portada' style='max-width: 70%'><br>
	                @reflektor
	            </div>
	            
	        </section>";
    	    return $str;
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
	                </a>
	                ";
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

    function showPrintedNew(){
        if($this->isSet){
            $exp='/<iframe.*src="([^\"]*)".*<\/iframe>/i';
            $sustitución = '$1';
            $sust=preg_replace($exp,$sustitución, $this->contenido);
            return "<h1 style='font-size: xx-large'> $this->titulo </h1>
            <h2> $this->grupo </h2>
            <p>
            <h4>$this->frase</h4>
            <div id='autor'>
                <address>por $this->autor</address>
                    Fecha de publicación: $this->publicacion
                    Fecha de modificación: $this->modificacion
            </div>
            </p>
        
            <img src='$this->portada' style='width: 100%; height: 60%'>
            <div class='pcontenido'>
            $sust
            </div>";
        }
    }
}
?>
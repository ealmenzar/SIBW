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
        $this->estado=$obj->estado;
        $this->isSet=true;
    }

    function setById($id) { 
    	$id=str_replace("'", "\'", $id);
        $query="SELECT * FROM noticias WHERE id='$id' ";
    	$result=$this->link->query($query);
    	if($obj=$result->fetch_object()){
    		$this->setByMySQLObject($obj);
    	}
    }

    function getComments($limit){
	    if($this->isSet) {
	    	$id=str_replace("'", "\'", $this->id);
            $query = "SELECT * FROM comentarios WHERE id_noticia='$id' ORDER BY fecha ASC ";
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

    function showEditForm(){
        if ($this->isSet) {
            return "<div class='edit'>
                    <form method='post' action=''  enctype=\"multipart/form-data\">
                        <input type=\"text\" name='titulo' value='".$this->titulo."' required><br>
                        <input type=\"text\" name='grupo' value='".$this->grupo."' required><br>
                        <input type=\"text\" name='frase' value='".$this->frase."' required><br>
                        <input type=\"text\" name='autor' value='".$this->autor."' required><br>
                        <input type=\"text\" name='pie' value='".$this->pie."' required><br>
                        <input type=\"file\" name='portada' required><br>
                        <div class='container-wysiwyg'>
                        <textarea name='contenido' class='wysiwyg' required>".$this->contenido."</textarea><br>
                        </div>
                        <textarea name='spotify' required>".$this->spotify."</textarea><br>
                        <textarea name='parrafo' required>".$this->parrafo."</textarea><br>
                        <select name='estado' required>
                        <option value='pendiente'".(($this->estado=="pendiente")? " selected":"").">Pendiente</option>
                        <option value='publicado'".(($this->estado=="publicado")? " selected":"").">Publicada</option>
                        </select><br>
                        <input type=\"submit\" value='Guardar'><br>
                    </form>
                    </div>";
        }
    }

        function showAddForm(){
            return "<div class='edit'>
                    <form method='post' action=''  enctype=\"multipart/form-data\">
                        <input type=\"text\" name='titulo' placeholder='Titulo' required><br>
                        <input type=\"text\" name='grupo' placeholder='Grupo' required><br>
                        <input type=\"text\" name='frase' placeholder='Frase' required><br>
                        <input type=\"text\" name='autor' placeholder='Autor' required><br>
                        <input type=\"text\" name='pie' placeholder='Pie' required><br>
                        <input type=\"file\" name='portada' required><br>
                        <div class='container-wysiwyg'>
                        <textarea name='contenido' class='wysiwyg' placeholder='contenido' required></textarea><br>
                        </div>
                        <textarea name='spotify' placeholder='spotify' required></textarea><br>
                        <textarea name='parrafo' placeholder='parrafo' required></textarea><br>
                        <input type=\"submit\" value='Guardar'><br>
                    </form>
                    </div>";
    }

    function showNewLine($isJefe){
        return "<tr>
            <td>".$this->id."</td>
            <td>".$this->titulo."</td>
            <td>".$this->grupo."</td>
            <td>".$this->frase."</td>
            <td>".$this->autor."</td>
            <td>".convertDateSystemToHuman($this->publicacion)."</td>
            <td>".convertDateSystemToHuman($this->modificacion)."</td>
            <td>".$this->portada."</td>
            <td>".$this->pie."</td>
            <td>".$this->estado."</td>".($isJefe ?
            "<td>".'<a style="display:inline-block" href="index.php?tpl=NewsAg&remove='.$this->id.'">
                            <svg style="height:30px;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" viewBox="0 0 79 100" version="1.1" x="0px" y="0px"><title>trash</title><desc>Created with Sketch.</desc><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage"><path d="M58.6214398,90 L20.3785602,90 C17.2516658,90 14.2778841,86.49426 13.7379424,82.1673877 L6.76143193,23.4782609 L72.2385681,23.4782609 L65.2620576,82.1673877 C64.722246,86.49322 61.7484595,90 58.6214398,90 L58.6214398,90 Z M37.525,79.2391304 C37.525,80.3196876 38.4092376,81.1956522 39.5,81.1956522 C40.5907624,81.1956522 41.475,80.3196876 41.475,79.2391304 L41.475,34.2391304 C41.475,33.1585733 40.5907624,32.2826087 39.5,32.2826087 C38.4092376,32.2826087 37.525,33.1585733 37.525,34.2391304 L37.525,79.2391304 L37.525,79.2391304 Z M51.4175337,78.8329788 C51.2846032,79.9054816 52.0544884,80.8816702 53.1371204,81.013357 C54.2197524,81.1450438 55.2051605,80.3823617 55.338091,79.3098589 L60.8740059,34.645282 C61.0069364,33.5727792 60.2370512,32.5965907 59.1544192,32.4649039 C58.0717872,32.3332171 57.0863791,33.0958992 56.9534486,34.168402 L51.4175337,78.8329788 L51.4175337,78.8329788 Z M23.661909,79.3098589 C23.7948395,80.3823617 24.7802476,81.1450438 25.8628796,81.013357 C26.9455116,80.8816702 27.7153968,79.9054816 27.5824663,78.8329788 L22.0465514,34.168402 C21.9136209,33.0958992 20.9282128,32.3332171 19.8455808,32.4649039 C18.7629488,32.5965907 17.9930636,33.5727792 18.1259941,34.645282 L23.661909,79.3098589 L23.661909,79.3098589 Z M19.996875,11.7391304 L3.94465095,11.7391304 C1.76079116,11.7391304 0,13.4910597 0,15.6521739 C0,17.8088907 1.76608039,19.5652174 3.94465095,19.5652174 L75.055349,19.5652174 C77.2392088,19.5652174 79,17.8132882 79,15.6521739 C79,13.4954571 77.2339196,11.7391304 75.055349,11.7391304 L59.003125,11.7391304 L59.003125,7.81719411 C59.003125,3.49505008 55.4609247,0 51.0977115,0 L27.9022885,0 C23.5318911,0 19.996875,3.49491816 19.996875,7.81719411 L19.996875,11.7391304 L19.996875,11.7391304 Z M27.896875,11.7391304 L51.1033048,11.7391304 C51.1034486,10.3810594 51.1030144,7.82608696 51.0977115,7.82608696 C51.0977115,7.82608696 27.896875,7.82066799 27.896875,7.81719411 L27.896875,11.7391304 L27.896875,11.7391304 Z" fill="#000000" sketch:type="MSShapeGroup"/></g><text x="0" y="105" fill="#000000" font-size="5px" font-weight="bold" font-family="\'Helvetica Neue\', Helvetica, Arial-Unicode, Arial, Sans-serif">Created by Julynn B.</text><text x="0" y="110" fill="#000000" font-size="5px" font-weight="bold" font-family="\'Helvetica Neue\', Helvetica, Arial-Unicode, Arial, Sans-serif">from the Noun Project</text></svg>
                            </a>

                            <a style="display:inline-block" href="index.php?tpl=NewsAg&edit='.$this->id.'">
                                <svg style="height:30px; xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 100 100" x="0px" y="0px"><title>2Artboard 56</title><path d="M2,86V32A12,12,0,0,1,14,20H50.68L38.88,32H14V86H68V61.12L80,49.32V86A12,12,0,0,1,68,98H14A12,12,0,0,1,2,86ZM89,2a9,9,0,0,0-6.36,2.64L40,48a12.28,12.28,0,0,0-2.9,4.73l-4.32,13a1.23,1.23,0,0,0,1.55,1.55l13-4.32A12.28,12.28,0,0,0,52,60L95.36,17.36A9,9,0,0,0,89,2Z"/><text x="0" y="115" fill="#000000" font-size="5px" font-weight="bold" font-family="\'Helvetica Neue\', Helvetica, Arial-Unicode, Arial, Sans-serif">Created by Gregor Cresnar</text><text x="0" y="120" fill="#000000" font-size="5px" font-weight="bold" font-family="\'Helvetica Neue\', Helvetica, Arial-Unicode, Arial, Sans-serif">from the Noun Project</text></svg>
                            </a>'."</td>":"").
        "</tr>";
    }
    function setId($id){
        $this->id = $id;
        return $this;
    }

    function load(){
        if(isset($this->id)){
            $id=str_replace("'", "\'", $this->id);
            $query="SELECT * FROM noticias WHERE id='$id'";
            $ret=$this->link->query($query);
            if($obj=$ret->fetch_object()){
                $this->setByMySQLObject($obj);
            }
        }
        return $this;
    }

    function save(){
        if($this->isSet){
            if(isset($this->id)){
                $id=str_replace("'", "\'", $this->id);
                $titulo=str_replace("'", "\'", $this->titulo);
                $grupo=str_replace("'", "\'", $this->grupo);
                $frase=str_replace("'", "\'", $this->frase);
                $autor=str_replace("'", "\'", $this->autor);
                $portada=str_replace("'", "\'", $this->portada);
                $pie=str_replace("'", "\'", $this->pie);
                $contenido=str_replace("'", "\'", $this->contenido);
                $spotify=str_replace("'", "\'", $this->spotify);
                $parrafo=str_replace("'", "\'", $this->parrafo);
                $estado=str_replace("'", "\'", $this->estado);
                $query="UPDATE noticias SET titulo='$titulo', grupo='$grupo', frase='$frase', autor='$autor', modificacion=NOW(), portada='$portada', pie='$pie', spotify='$spotify', parrafo='$parrafo', contenido='$contenido', estado='$estado' WHERE id ='$id'";
                $this->link->query($query);
            }else{
                $titulo=str_replace("'", "\'", $this->titulo);
                $grupo=str_replace("'", "\'", $this->grupo);
                $frase=str_replace("'", "\'", $this->frase);
                $autor=str_replace("'", "\'", $this->autor);
                $portada=str_replace("'", "\'", $this->portada);
                $pie=str_replace("'", "\'", $this->pie);
                $contenido=str_replace("'", "\'", $this->contenido);
                $spotify=str_replace("'", "\'", $this->spotify);
                $parrafo=str_replace("'", "\'", $this->parrafo);
                $estado=str_replace("'", "\'", $this->estado);
                echo "entra";
                $query="INSERT INTO noticias (id, titulo, grupo, frase, autor, publicacion, modificacion, portada, pie, spotify, parrafo, contenido, estado) VALUES (NULL, '$titulo', '$grupo', '$frase', '$autor', NOW(), NOW(), '$portada', '$pie', '$contenido', '$spotify', '$parrafo', '$estado');";
                $this->link->query($query);
            }
        }
        return $this;
    }

    function remove(){
        if(isset($this->id)){
            $id=str_replace("'", "\'", $this->id);
            $query="DELETE FROM noticias WHERE id='$id'";
            $this->link->query($query);
        }
    }
    function showFullNew($isUser) { 
    	if($this->isSet){
    	    $str="<aside id='coment-block'>";
    	    if(isset($this->comments)){
                $str.="
                    <ul id='comments'>";
                foreach ($this->comments as $Com){
                    $str.= $Com->showComment();
                }
                $str.= "</ul>";
                if($isUser){
                	$str.="<p id='error-1' class='error'>
                    Por favor, no se haga pasar por parte del staff de la página web
                    </p>
                        <p id='error-2' class='error'>
                    Por favor, siga las reglas de la página web y no comparta información personal, como correos, números de teléfono... Y NO INSULTE
                    </p>
                        <form onsubmit='return SubmitComment(\"author\",\"email\",\"comment\",\"idNot\",\"comments\")'>
                            <input type='text' placeholder='Nombre' id='author'  onkeyup='ValidateAuthor(this,\"show\",\"error-1\")' required><br>
                            <input type='email' placeholder='Email' id='email' required><br>
                            <input type='hidden' id='idNot' value='$this->id' required>
                            <textarea placeholder='Escribe aquí tu comentario...' id='comment' onkeyup='ValidateComment(this,\"show\",\"error-2\")' required></textarea><br>
                            <input type='submit' class='comment-btn' value='Enviar Comentario'>
                        </form>";
                    
                        
                }
            }
            $str.="</aside>";
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
    		$phraseCut=(strlen($this->parrafo)<=200)?$this->parrafo : substr ($this->parrafo, 0,200)."...";
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
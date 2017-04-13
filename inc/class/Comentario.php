<?php
class Comentario {

    function __construct($link)
    {
        $this->link = $link;
        $this->isSet = false;
    }

    function setByMySQLObject($obj)
    {
        $this->id = $obj->id;
        $this->autor = $obj->autor;
        $this->ip = $obj->ip;
        $this->fecha = $obj->fecha;
        $this->contenido = $obj->contenido;
        $this->email = $obj->email;
        $this->id_noticia = $obj->id_noticia;
        $this->isSet = true;
    }

    function setByIdNoticia($id_noticia)
    {
        //comprobación id
        $query = "SELECT * FROM comentarios WHERE id_noticia='$id_noticia' ";
        $result = $this->link->query($query);
        if ($obj = $result->fetch_object()) {
            $this->setByMySQLObject($obj);
        }
    }

    function showAllComments(){
        if ($this->isSet) {
            return "<aside id='coment-block'>
                    <ul id='comments'>
                    <li>
                        <b>Autor:</b> Iván<br>
                        <b>Fecha:</b> 24/02/2014 <b>Hora:</b> 13:21<br>
                        <p>Hola! Me encanta este disco. Ojalá vengan a España. Publicaréis las ciudades de su gira?</p>
                    </li>
                    <li>
                        <b>Autor:</b> Admin<br>
                        <b>Fecha:</b> 20/02/2014 <b>Hora:</b> 17:52<br>
                        <p>¡Hola Iván! A nosotros también nos encanta el disco. Y sí, próximamente podremos conocer las ciudades donde actuarán y lo publicaremos. ¡Atento!</p>
                    </li>
                    </ul>
                    <p id='error-1' class='error'>
                Por favor, no se haga pasar por parte del staff de la página web
                </p>
                    <p id='error-2' class='error'>
                Por favor, siga las reglas de la página web y no comparta información personal, como correos, números de teléfono... Y NO INSULTE
                </p>
                    <div>
                        <input type='text' placeholder='Nombre' id='author' onkeyup='ValidateAuthor(this,\"show\",\"error-1\")'><br>
                        <input type='text' placeholder='Email' id='email' onkeyup='ValidateComment(this,\"show\",\"error-2\")'><br>
                        <textarea placeholder='Escribe aquí tu comentario...' id='comment' onkeyup='ValidateComment(this,\"show\",\"error-2\")'></textarea><br>
                        <button class='comment-btn' onclick='SubmitComment(\"author\",\"email\",\"comment\",\"comments\")'>Enviar Comentario</button>
                    </div>
                
                    </aside>";
        }
    }
}
?>
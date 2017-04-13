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

    function showComment(){
        if ($this->isSet) {
            return "<li>
                        <b>Autor:</b> ".$this->autor."<br>
                        <b>Fecha:</b> ".$this->fecha." <b>Hora:</b> <br>
                        <p>".$this->contenido."</p>
                    </li>";
        }
    }
}
?>
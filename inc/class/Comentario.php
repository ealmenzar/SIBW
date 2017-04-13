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
        $this->fecha = new DateTime($obj->fecha);
        $this->contenido = $obj->contenido;
        $this->email = $obj->email;
        $this->id_noticia = $obj->id_noticia;
        $this->isSet = true;
    }

    function showComment(){
        if ($this->isSet) {
            return "<li>
                        <b>Autor:</b> ".$this->autor."<br>
                        <b>Fecha:</b> ".$this->fecha->format("d/m/Y")." <b>Hora:</b> ".$this->fecha->format("H:i")."<br>
                        <p>".$this->contenido."</p>
                    </li>";
        }
    }
    function set($autor,$email,$contenido,$id_noticia){
        $this->autor = $autor;
        $this->contenido = $contenido;
        $this->email = $email;
        $this->id_noticia = $id_noticia;
        $this->isSet = true;
    }
    function save(){
        if($this->isSet){
            if(isset($this->id)){
                //update
            }else{
                $autor=str_replace("'", "\'", $this->autor);
                $contenido=str_replace("'", "\'", $this->contenido);
                $email=str_replace("'", "\'", $this->email);
                $id_noticia=str_replace("'", "\'", $this->id_noticia);
                if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
                } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                } else {
                    $ip = $_SERVER['REMOTE_ADDR'];
                }
                $query="INSERT INTO comentarios (autor, ip, id, fecha, contenido, email, id_noticia) VALUES ('$autor', '$ip', NULL, NOW() , '$contenido', '$email', '$id_noticia')";
                $this->link->query($query);
            }
        }
    }
}
?>
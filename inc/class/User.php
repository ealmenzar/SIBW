<?php
class User { 

	function __construct($link) {
        $this->link=$link;
        $this->isSet=false;
    }
    
	function setByMySQLObject($obj) { 
        $this->id=$obj->id;
        $this->email=$obj->email;
        $this->pwd=$obj->pwd;
        $this->nombre=$obj->nombre;
        $this->apellidos=$obj->apellidos;
        $this->nacimiento=$obj->nacimiento;
        $this->registro=$obj->registro;
        $this->ciudad=$obj->ciudad;
        $this->permiso=$obj->permiso;
        $this->isSet=true;
    }

    function setByEmail($email) { 
    	$email=str_replace("'", "\'", $email);
        $query="SELECT * FROM usuarios WHERE email='$email' ";
    	$result=$this->link->query($query);
    	if($obj=$result->fetch_object()){
    		$this->setByMySQLObject($obj);
    	}
    }
    function set($email,$pwd,$nombre,$apellidos,$nacimiento,$ciudad){
        $this->email=$email;
        $this->pwd=$pwd;
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
        $this->nacimiento=$nacimiento;
        $this->ciudad=$ciudad;
        $this->isSet = true;
    }
    function save(){
        if($this->isSet){
            if(isset($this->id)){
                /*$id=str_replace("'", "\'", $this->id);
                $autor=str_replace("'", "\'", $this->autor);
                $contenido=str_replace("'", "\'", $this->contenido);
                $email=str_replace("'", "\'", $this->email);
                $query="UPDATE comentarios SET email = '$email',autor = '$autor',contenido = '$contenido' WHERE id ='$id'";
                $this->link->query($query);*/
            }else{
                $email=str_replace("'", "\'", $this->email);
                $pwd=str_replace("'", "\'", $this->pwd);
                $nombre=str_replace("'", "\'", $this->nombre);
                $apellidos=str_replace("'", "\'", $this->apellidos);
                $nacimiento=convertDateHumanToSystem(str_replace("'", "\'", $this->nacimiento));
                $registro=str_replace("'", "\'", $this->registro);
                $ciudad=str_replace("'", "\'", $this->ciudad);
                $query="INSERT INTO usuarios (id, email, pwd, nombre, apellidos, nacimiento, registro, ciudad, permiso) VALUES (NULL, '$email', '$pwd', '$nombre', '$apellidos', '$nacimiento', NOW(), '$ciudad', 'usuario');";
                $this->link->query($query);
            }
        }
        return $this;
    }

    function isDefined(){
    	return $this->isSet;
    }

    function testPwd($pwd) { 
    	return $this->pwd==$pwd;
    } 

}
?>
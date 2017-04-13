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

    function isDefined(){
    	return $this->isSet;
    }

    function testPwd($pwd) { 
    	return $this->pwd==$pwd;
    } 

}
?>
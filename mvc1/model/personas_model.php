<?php

class personas_model{
    private $db;
    private $personas;
   
    public function __construct(){
        require_once ("model/conexion.php");
        $this->db=Conectar::conexion();
        $this->personas=array();

        
    }

    public function getPersonas(){
       
       $consulta= $this->db->query("select * from datos_usuarios");

        while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
            $this->personas[]=$filas;
        }
        return $this->personas;


    }
    
}

?>
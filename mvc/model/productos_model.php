<?php

class productos_model{
    private $db;
    private $productos;
   
    public function __construct(){
        require_once ("model/conexion.php");
        $this->db=Conectar::conexion();
        $this->productos=array();

        
    }

    public function getProductos(){
       // $consulta= $this->db->query("select * from artículos");
       $consulta= $this->db->query("select * from datos_usuarios");

        while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
            $this->producto[]=$filas;
        }
        return $this->productos;


    }
    
}

?>
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
        $consulta= $this->db->query("select * from artículos");
       

        while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
            $this->productos[]=$filas;
           
        }
        return $this->productos;


    }
    
}


?>
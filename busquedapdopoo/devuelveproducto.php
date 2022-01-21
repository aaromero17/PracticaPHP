<?php

require "conexion.php";

class Devuelveproducto extends Conexion{

    public function Devuelveproducto(){
        parent::__construct();

    }
    
    


public function getProducto($datos){
    $sql="select * from artículos where PAISDEORIGEN='".$datos."'";
   
    $resultado=$this->conexionDB->prepare($sql);
    $resultado->execute(array());
    $registro=$resultado->fetchAll(PDO::FETCH_ASSOC);
    $resultado->closeCursor();
    return $registro;
    $this->conexionDB=null;


}


}

?>